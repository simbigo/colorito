<?php

namespace Simbigo\Colorito\Transform;

use Imagick;

/**
 * Class Opacity
 */
class Opacity implements TransformationInterface
{
    /**
     * @var
     */
    public $value;

    /**
     * Opacity constructor.
     *
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @param Imagick $canvas
     * @return mixed
     */
    public function apply(Imagick $canvas)
    {
        $canvas->setImageOpacity($this->value);
    }
}
