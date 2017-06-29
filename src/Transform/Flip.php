<?php

namespace Simbigo\Colorito\Transform;

use Imagick;

class Flip implements TransformationInterface
{
    /**
     * @param Imagick $canvas
     * @return mixed
     */
    public function apply(Imagick $canvas)
    {
        $canvas->flipImage();
    }
}