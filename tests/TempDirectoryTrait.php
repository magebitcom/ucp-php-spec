<?php
/**
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */
declare(strict_types=1);

namespace Magebit\UcpSpecGenerator\Test;

/**
 * Creates throwaway directories and removes them when the test finishes
 */
trait TempDirectoryTrait
{
    private array $tempDirectories = [];

    /**
     * Create a unique empty directory
     *
     * @return string Absolute path
     */
    private function makeTempDir(): string
    {
        $dir = sys_get_temp_dir() . '/ucp-spec-test-' . bin2hex(random_bytes(8));
        mkdir($dir, 0777, true);
        $this->tempDirectories[] = $dir;

        return $dir;
    }

    /**
     * @return void
     */
    protected function tearDown(): void
    {
        foreach ($this->tempDirectories as $dir) {
            $this->removeDirectory($dir);
        }

        $this->tempDirectories = [];

        parent::tearDown();
    }

    /**
     * Delete a directory tree
     *
     * @param string $dir Directory to remove
     * @return void
     */
    private function removeDirectory(string $dir): void
    {
        if (!is_dir($dir)) {
            return;
        }

        foreach (array_diff(scandir($dir) ?: [], ['.', '..']) as $entry) {
            $path = $dir . '/' . $entry;
            is_dir($path) ? $this->removeDirectory($path) : unlink($path);
        }

        rmdir($dir);
    }
}
