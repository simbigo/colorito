<?php

declare(strict_types = 1);

namespace Simbigo\Colorito\Image;

/**
 * Interface ImageInterface
 */
interface ImageInterface extends CanvasInterface
{
    /**
     * Append the layer as last item of the layers list
     *
     * @param LayerInterface $layer
     * @return static
     */
    public function addLayer(LayerInterface $layer);

    /**
     * Return number of layers
     *
     * @return int
     */
    public function countLayers(): int;

    /**
     * Return a layer by its index
     *
     * @param int $index
     * @return LayerInterface
     */
    public function getLayer(int $index): LayerInterface;

    /**
     * Return layers collection of the image
     *
     * @return LayerInterface[]
     */
    public function getLayers(): array;

    /**
     * Check if the image contains of a layer with passed index
     *
     * @param int $index
     * @return bool
     */
    public function hasLayer(int $index): bool;
}
