<?php
/**
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */
declare(strict_types=1);

namespace Magebit\UcpSpecGenerator\Test;

use Magebit\UcpSpecGenerator\IntegrityChecker;
use PHPUnit\Framework\TestCase;

/**
 * Covers the post-generation gate that caught the missing interfaces
 */
class IntegrityCheckerTest extends TestCase
{
    use TempDirectoryTrait;

    /**
     * @return void
     */
    public function testReportsTypeReferencedOnlyInADocblock(): void
    {
        $dir = $this->makeTempDir();
        $this->writeInterface($dir, 'Api\\Types', 'CardPaymentInstrumentInterface', <<<'PHP'
    /**
     * @return \Magebit\UcpSpec\Api\Types\CardPaymentInstrumentDisplayInterface|null
     */
    public function getDisplay(): CardPaymentInstrumentDisplayInterface|null;
PHP);

        $dangling = (new IntegrityChecker())->findDanglingReferences($dir);

        $this->assertSame(
            ['Magebit\\UcpSpec\\Api\\Types\\CardPaymentInstrumentDisplayInterface'],
            array_keys($dangling)
        );
        $this->assertSame(['Api/Types/CardPaymentInstrumentInterface.php'], $dangling[array_key_first($dangling)]);
    }

    /**
     * @return void
     */
    public function testReportsTypeReferencedOnlyByAUseStatement(): void
    {
        $dir = $this->makeTempDir();
        $this->writeInterface($dir, 'Api\\Shopping', 'CheckoutInterface', '', ['Magebit\\UcpSpec\\Api\\Shopping\\FulfillmentInterface']);

        $dangling = (new IntegrityChecker())->findDanglingReferences($dir);

        $this->assertArrayHasKey('Magebit\\UcpSpec\\Api\\Shopping\\FulfillmentInterface', $dangling);
    }

    /**
     * @return void
     */
    public function testPassesWhenEveryReferenceIsDeclared(): void
    {
        $dir = $this->makeTempDir();
        $this->writeInterface($dir, 'Api\\Types', 'CardPaymentInstrumentInterface', <<<'PHP'
    /**
     * @return \Magebit\UcpSpec\Api\Types\CardPaymentInstrumentDisplayInterface|null
     */
    public function getDisplay(): CardPaymentInstrumentDisplayInterface|null;
PHP);
        $this->writeInterface($dir, 'Api\\Types', 'CardPaymentInstrumentDisplayInterface');

        $this->assertSame([], (new IntegrityChecker())->findDanglingReferences($dir));
    }

    /**
     * The naive scan reports bare namespace prefixes as missing types; the checker must not.
     *
     * @return void
     */
    public function testNamespaceDeclarationIsNotTreatedAsAReference(): void
    {
        $dir = $this->makeTempDir();
        $this->writeInterface($dir, 'Api\\Schemas\\Shopping\\Types', 'BuyerInterface');

        $dangling = (new IntegrityChecker())->findDanglingReferences($dir);

        $this->assertSame([], $dangling);
    }

    /**
     * @return void
     */
    public function testCrossNamespaceImportResolvesThroughTheUseMap(): void
    {
        $dir = $this->makeTempDir();
        $this->writeInterface(
            $dir,
            'Api\\Shopping',
            'CheckoutInterface',
            "    public function getBuyer(): BuyerInterface;",
            ['Magebit\\UcpSpec\\Api\\Types\\BuyerInterface']
        );
        $this->writeInterface($dir, 'Api\\Types', 'BuyerInterface');

        $this->assertSame([], (new IntegrityChecker())->findDanglingReferences($dir));
    }

    /**
     * Write a minimal generated-style interface file
     *
     * @param string $root Generated tree root
     * @param string $namespaceSuffix Namespace below Magebit\UcpSpec
     * @param string $name Interface name
     * @param string $body Interface body
     * @param string[] $imports Fully qualified names to import
     * @return void
     */
    private function writeInterface(
        string $root,
        string $namespaceSuffix,
        string $name,
        string $body = '',
        array $imports = []
    ): void {
        $directory = $root . '/' . str_replace('\\', '/', $namespaceSuffix);

        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        $use = '';
        foreach ($imports as $import) {
            $use .= "use {$import};\n";
        }

        file_put_contents(
            $directory . '/' . $name . '.php',
            "<?php\n\ndeclare(strict_types=1);\n\nnamespace Magebit\\UcpSpec\\{$namespaceSuffix};\n\n"
            . $use . "\ninterface {$name}\n{\n{$body}\n}\n"
        );
    }
}
