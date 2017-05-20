<?php

declare(strict_types = 1);

namespace Simbigo\Colorito\Effects;

use Imagick;

/**
 * Interface EffectInterface
 */
interface EffectInterface
{
    /**
     * Apply the effect to the canvas
     *
     * @param Imagick $canvas
     * @return void
     */
    public function apply(Imagick $canvas);
}
