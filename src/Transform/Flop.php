<?php

namespace Simbigo\Colorito\Transform;

use Imagick;

class Flop implements TransformationInterface
{
    /**
     * @param Imagick $canvas
     * @return mixed
     */
    public function apply(Imagick $canvas)
    {
        $canvas->flopImage();
    }
}