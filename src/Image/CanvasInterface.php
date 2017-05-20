<?php

declare(strict_types = 1);

namespace Simbigo\Colorito\Image;

use Imagick;
use Simbigo\Colorito\Effects\EffectInterface;
use Simbigo\Colorito\Transform\TransformationInterface;

/**
 * Interface CanvasInterface
 */
interface CanvasInterface
{
    /**
     * Apply the effect to a canvas
     *
     * @param EffectInterface $effect
     * @return static
     */
    public function effect(EffectInterface $effect);

    /**
     * Build the canvas object as instance of Imagick
     *
     * @return Imagick
     */
    public function makeImage(): Imagick;

    /**
     * Apply the transformation to a canvas
     *
     * @param TransformationInterface $transformation
     * @return static
     */
    public function transform(TransformationInterface $transformation);
}
