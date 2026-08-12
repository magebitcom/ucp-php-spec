<?php
/**
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */
declare(strict_types=1);

namespace Magebit\UcpSpecGenerator\Test;

use Magebit\UcpSpecGenerator\DirectoryComparator;
use Magebit\UcpSpecGenerator\Generator;
use Magebit\UcpSpecGenerator\IntegrityChecker;
use PHPUnit\Framework\TestCase;

/**
 * End-to-end checks on the emitted tree: naming, composition and the DTOs that back the interfaces
 */
class GeneratorTest extends TestCase
{
    use TempDirectoryTrait;

    private const RUNTIME_DIR = __DIR__ . '/../runtime';

    /**
     * An inline object nested inside allOf must still get its own interface.
     *
     * @return void
     */
    public function testInlineObjectInsideAllOfIsGenerated(): void
    {
        $output = $this->generate();

        $this->assertFileExists($output . '/Magebit/UcpSpec/Api/Types/CardPaymentInstrumentDisplayInterface.php');
        $this->assertFileExists($output . '/Magebit/UcpSpec/Data/Types/CardPaymentInstrumentDisplay.php');
    }

    /**
     * Only the mutable tree is emitted; the immutable twin it used to ship alongside is gone.
     *
     * @return void
     */
    public function testOnlyOneInterfaceTreeIsEmitted(): void
    {
        $output = $this->generate();

        $this->assertDirectoryExists($output . '/Magebit/UcpSpec/Api');
        $this->assertDirectoryDoesNotExist($output . '/Magebit/UcpSpec/MutableApi');
    }

    /**
     * A $defs entry that is nothing but a $ref is named after its target, not its declaring file,
     * so it deduplicates against the target instead of producing an unreferenced twin.
     *
     * @return void
     */
    public function testBareRefDefinitionResolvesToItsTarget(): void
    {
        $output = $this->generate();
        $path = $output . '/Magebit/UcpSpec/Api/Types/FulfillmentResponseInterface.php';

        $this->assertFileExists($path);
        $this->assertFileDoesNotExist($output . '/Magebit/UcpSpec/Api/FulfillmentResponseInterface.php');

        $contents = (string)file_get_contents($path);
        $this->assertStringContainsString('public function getMethods()', $contents);
        $this->assertStringContainsString('This file is auto-generated. Do not edit manually.', $contents);
    }

    /**
     * The four extension variants declare the same definition names, and the file variant in the
     * type name is what keeps them from overwriting one another.
     *
     * @return void
     */
    public function testSameDefinitionInTwoVariantsProducesTwoTypes(): void
    {
        $output = $this->generate();

        $this->assertFileExists($output . '/Magebit/UcpSpec/Api/DiscountResponseCheckoutInterface.php');
        $this->assertFileExists($output . '/Magebit/UcpSpec/Api/DiscountUpdateRequestCheckoutInterface.php');
    }

    /**
     * @return void
     */
    public function testGenerationReportsNoCollisions(): void
    {
        $generator = new Generator($this->writeFixtureSpec(), $this->makeTempDir());

        ob_start();
        $generator->generate();
        ob_end_clean();

        $this->assertSame([], $generator->getCollisions());
    }

    /**
     * A definition named after its own file adds nothing, so the redundant repeat is dropped.
     *
     * @return void
     */
    public function testDefinitionNamedAfterItsFileDoesNotRepeatTheConcept(): void
    {
        $output = $this->generate();

        $this->assertFileExists($output . '/Magebit/UcpSpec/Api/DiscountResponseInterface.php');
        $this->assertFileDoesNotExist($output . '/Magebit/UcpSpec/Api/DiscountResponseDiscountInterface.php');
    }

    /**
     * @return void
     */
    public function testGeneratedTreeHasNoDanglingReferences(): void
    {
        $this->assertSame(
            [],
            (new IntegrityChecker())->findDanglingReferences($this->generate(), self::RUNTIME_DIR)
        );
    }

    /**
     * @return void
     */
    public function testIntegrityCheckFailsWhenAGeneratedTypeIsRemoved(): void
    {
        $output = $this->generate();
        unlink($output . '/Magebit/UcpSpec/Api/Types/CardPaymentInstrumentDisplayInterface.php');

        $dangling = (new IntegrityChecker())->findDanglingReferences($output, self::RUNTIME_DIR);

        $this->assertArrayHasKey('Magebit\\UcpSpec\\Api\\Types\\CardPaymentInstrumentDisplayInterface', $dangling);
    }

    /**
     * The runtime base is hand-written, so removing it has to fail the gate rather than be exempt.
     *
     * @return void
     */
    public function testIntegrityCheckFailsWhenTheRuntimeBaseIsMissing(): void
    {
        $dangling = (new IntegrityChecker())->findDanglingReferences($this->generate(), $this->makeTempDir());

        $this->assertArrayHasKey('Magebit\\UcpSpec\\Runtime\\SpecObject', $dangling);
    }

    /**
     * @return void
     */
    public function testEveryInterfaceHasAMatchingDto(): void
    {
        $output = $this->generate();

        foreach ($this->findPhpFiles($output . '/Magebit/UcpSpec/Api') as $interface) {
            $dto = str_replace(
                ['/Api/', 'Interface.php'],
                ['/Data/', '.php'],
                $interface
            );

            $this->assertFileExists($dto, "Missing DTO for {$interface}");
        }
    }

    /**
     * @return void
     */
    public function testDtoDeclaresTheInterfaceItImplements(): void
    {
        $output = $this->generate();
        $contents = (string)file_get_contents($output . '/Magebit/UcpSpec/Data/Types/FulfillmentMethodResponse.php');

        $this->assertStringContainsString(
            'class FulfillmentMethodResponse extends SpecObject implements FulfillmentMethodResponseInterface',
            $contents
        );
        $this->assertStringContainsString('return $this->stringOrNull(self::KEY_ID);', $contents);
    }

    /**
     * @return void
     */
    public function testTwoRunsProduceByteIdenticalOutput(): void
    {
        $spec = $this->writeFixtureSpec();

        $this->assertSame([], (new DirectoryComparator())->compare(
            $this->generate($spec),
            $this->generate($spec)
        ));
    }

    /**
     * @return void
     */
    public function testRunRecordsNoErrors(): void
    {
        $generator = new Generator($this->writeFixtureSpec(), $this->makeTempDir());

        ob_start();
        $generator->generate();
        ob_end_clean();

        $this->assertSame([], $generator->getErrors());
    }

    /**
     * Generate the fixture spec into a fresh output directory
     *
     * @param string|null $specDir Existing fixture spec directory, or null to create one
     * @return string Output directory
     */
    private function generate(?string $specDir = null): string
    {
        $output = $this->makeTempDir();

        ob_start();
        (new Generator($specDir ?? $this->writeFixtureSpec(), $output))->generate();
        ob_end_clean();

        return $output;
    }

    /**
     * @param string $directory Directory to walk
     * @return string[] Absolute paths of every PHP file below it
     */
    private function findPhpFiles(string $directory): array
    {
        $files = [];
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($directory, \FilesystemIterator::SKIP_DOTS)
        );

        foreach ($iterator as $file) {
            if ($file->isFile() && $file->getExtension() === 'php') {
                $files[] = (string)$file->getPathname();
            }
        }

        return $files;
    }

    /**
     * Write a spec fixture covering the allOf inline object, the bare-$ref alias and two variants
     * of one extension schema
     *
     * @return string Spec directory
     */
    private function writeFixtureSpec(): string
    {
        $dir = $this->makeTempDir();
        mkdir($dir . '/types');

        $this->writeJson($dir . '/types/payment_instrument.json', [
            'title' => 'Payment Instrument',
            'type' => 'object',
            'required' => ['id'],
            'properties' => ['id' => ['type' => 'string', 'description' => 'Instrument id.']],
        ]);

        $this->writeJson($dir . '/types/card_payment_instrument.json', [
            'title' => 'Card Payment Instrument',
            'allOf' => [
                ['$ref' => 'payment_instrument.json'],
                [
                    'type' => 'object',
                    'properties' => [
                        'display' => [
                            'type' => 'object',
                            'description' => 'Display information for this card payment instrument.',
                            'properties' => ['brand' => ['type' => 'string', 'description' => 'Card brand.']],
                        ],
                    ],
                ],
            ],
        ]);

        $this->writeJson($dir . '/types/fulfillment_method_resp.json', [
            'title' => 'Fulfillment Method Response',
            'type' => 'object',
            'properties' => ['id' => ['type' => 'string']],
        ]);

        $this->writeJson($dir . '/types/fulfillment_resp.json', [
            'title' => 'Fulfillment Response',
            'type' => 'object',
            'properties' => [
                'methods' => ['type' => 'array', 'items' => ['$ref' => 'fulfillment_method_resp.json']],
            ],
        ]);

        $this->writeJson($dir . '/fulfillment_resp.json', [
            'title' => 'Fulfillment Extension Response',
            '$defs' => [
                'fulfillment' => ['$ref' => 'types/fulfillment_resp.json'],
                'checkout' => [
                    'title' => 'Checkout with Fulfillment Response',
                    'allOf' => [
                        ['type' => 'object', 'properties' => ['id' => ['type' => 'string']]],
                        ['type' => 'object', 'properties' => ['fulfillment' => ['$ref' => '#/$defs/fulfillment']]],
                    ],
                ],
            ],
        ]);

        foreach (['discount_resp', 'discount.update_req'] as $file) {
            $this->writeJson($dir . '/' . $file . '.json', [
                'title' => 'Discount Extension',
                '$defs' => [
                    'discount' => ['type' => 'object', 'properties' => ['code' => ['type' => 'string']]],
                    'checkout' => [
                        'type' => 'object',
                        'properties' => ['discounts' => ['$ref' => '#/$defs/discount']],
                    ],
                ],
            ]);
        }

        return $dir;
    }

    /**
     * Write a JSON fixture file
     *
     * @param string $path Destination path
     * @param array $data Schema data
     * @return void
     */
    private function writeJson(string $path, array $data): void
    {
        file_put_contents($path, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }
}
