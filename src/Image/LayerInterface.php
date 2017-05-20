<?php

declare(strict_types = 1);

namespace Simbigo\Colorito\Image;

/**
 * Interface LayerInterface
 */
interface LayerInterface extends CanvasInterface
{
    /**
     * Return blend mode of a layer
     *
     * @return int
     */
    public function getBlendMode(): int;

    /**
     * Return Image instance if it is set as a parent of the layer
     *
     * @return ImageInterface|null
     */
    public function getContext();

    /**
     * Return source path of the layer if it was created from file
     *
     * @return string|null
     */
    public function getSourcePath();

    /**
     * Load image file as the layer content
     *
     * @param string $fileName
     * @return static|LayerInterface
     */
    public function loadFile(string $fileName): LayerInterface;

    /**
     * Set blend mode
     *
     * @param int $mode
     * @return static|LayerInterface
     */
    public function setBlendMode(int $mode): LayerInterface;

    /**
     * Set Image instance as a parent of the layer
     *
     * @param ImageInterface $image
     * @return static
     */
    public function setContext(ImageInterface $image);
}
