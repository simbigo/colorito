<?php

namespace Colorito\Tests;

use DirectoryIterator;
use PHPUnit\Framework\TestCase;

class ColoritoUnitTestCase extends TestCase
{
    protected function setUp()
    {
        parent::setUp();

        if (!file_exists(COLORITO_TEST_DATA_DIR . '/village.jpg') || !file_exists(COLORITO_TEST_DATA_DIR . '/tower.jpg')) {
            $this->markTestSkipped('Source images are not available');
        }

        if (!is_dir(COLORITO_TEST_RESULT_DIR)) {
            mkdir(COLORITO_TEST_RESULT_DIR);
        }

        $di = new DirectoryIterator(COLORITO_TEST_RESULT_DIR);
        foreach ($di as $file) {
            if (!$file->isDot()) {
                unlink(COLORITO_TEST_RESULT_DIR . '/' . $file->getFilename());
            }
        }
    }
}