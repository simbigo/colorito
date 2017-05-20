<?php

declare(strict_types = 1);

namespace Simbigo\Colorito\Transform;

use Imagick;

/**
 * Interface TransformationInterface
 */
interface TransformationInterface
{
    /**
     * @param Imagick $canvas
     * @return void
     */
    public function apply(Imagick $canvas);
}
