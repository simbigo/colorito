<?php

use Colorito\Tests\ColoritoUnitTestCase;
use Simbigo\Colorito\Image\Image;

/**
 * Class SimpleConvertTest
 */
class SimpleConvertTest extends ColoritoUnitTestCase
{
    public function testConvert()
    {
        $image = Image::makeFromFile(COLORITO_TEST_DATA_DIR . '/village.jpg');
        $result = $image->saveAs(COLORITO_TEST_RESULT_DIR . '/result.png');
        $this->assertTrue($result);
        $this->assertFileExists(COLORITO_TEST_RESULT_DIR . '/result.png');
    }
}
