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
 * End-to-end checks on the emitted code for the two shapes that produced dangling references
 */
class GeneratorTest extends TestCase
{
    use TempDirectoryTrait;

    /**
     * An inline object nested inside allOf must still get its own interface.
     *
     * @return void
     */
    public function testInlineObjectInsideAllOfIsGenerated(): void
    {
        $output = $this->generate();

        foreach (['Api', 'MutableApi'] as $tree) {
            $this->assertFileExists(
                $output . "/Magebit/UcpSpec/{$tree}/Types/CardPaymentInstrumentDisplayInterface.php"
            );
        }
    }

    /**
     * A $defs entry that is nothing but a $ref must be emitted from its target's body.
     *
     * @return void
     */
    public function testBareRefDefinitionIsGeneratedFromItsTarget(): void
    {
        $output = $this->generate();
        $path = $output . '/Magebit/UcpSpec/Api/FulfillmentFulfillmentInterface.php';

        $this->assertFileExists($path);

        $contents = file_get_contents($path);
        $this->assertStringContainsString('interface FulfillmentFulfillmentInterface', $contents);
        $this->assertStringContainsString('public function getMethods()', $contents);
        $this->assertStringContainsString('This file is auto-generated. Do not edit manually.', $contents);
    }

    /**
     * @return void
     */
    public function testGeneratedTreeHasNoDanglingReferences(): void
    {
        $this->assertSame([], (new IntegrityChecker())->findDanglingReferences($this->generate()));
    }

    /**
     * @return void
     */
    public function testIntegrityCheckFailsWhenAGeneratedTypeIsRemoved(): void
    {
        $output = $this->generate();
        unlink($output . '/Magebit/UcpSpec/Api/Types/CardPaymentInstrumentDisplayInterface.php');

        $dangling = (new IntegrityChecker())->findDanglingReferences($output);

        $this->assertArrayHasKey('Magebit\\UcpSpec\\Api\\Types\\CardPaymentInstrumentDisplayInterface', $dangling);
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
     * Write a spec fixture reproducing the allOf inline object and the bare-$ref alias
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
