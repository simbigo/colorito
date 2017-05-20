<?php

declare(strict_types = 1);

namespace Simbigo\Colorito\Image;

use Imagick;
use Simbigo\Colorito\Effects\EffectInterface;
use Simbigo\Colorito\Transform\TransformationInterface;

/**
 * Class AbstractCanvas
 *
 * Implements base functions of a canvas object
 */
abstract class AbstractCanvas implements CanvasInterface
{
    /**
     * @var EffectInterface[]
     */
    protected $effects = [];
    /**
     * @var EffectInterface[]|TransformationInterface[]
     */
    protected $modifiers = [];
    /**
     * @var TransformationInterface[]
     */
    protected $transformations = [];

    /**
     * @param Imagick $canvas
     */
    protected function applyModifiers(Imagick $canvas)
    {
        foreach ($this->modifiers as $modifier) {
            $modifier->apply($canvas);
        }
    }

    /**
     * Append the effect to the canvas
     *
     * @param EffectInterface $effect
     * @return $this|CanvasInterface
     */
    public function effect(EffectInterface $effect): CanvasInterface
    {
        $this->effects[] = $effect;
        $this->modifiers[] = $effect;
        return $this;
    }

    /**
     * Save the channel as an image
     *
     * @param $channel
     * @param $destinationPath
     * @return bool
     */
    public function saveChannel(int $channel, $destinationPath): bool
    {
        $image = $this->makeImage();
        $image->separateImageChannel($channel);
        return $image->writeImage($destinationPath);
    }

    /**
     * Transform the canvas using a transformation object
     *
     * @param TransformationInterface $transformation
     * @return $this|CanvasInterface
     */
    public function transform(TransformationInterface $transformation): CanvasInterface
    {
        $this->transformations[] = $transformation;
        $this->modifiers[] = $transformation;
        return $this;
    }
}
