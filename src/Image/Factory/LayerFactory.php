<?php

declare(strict_types = 1);

namespace Simbigo\Colorito\Image\Factory;

use Simbigo\Colorito\Image\Layer;
use Simbigo\Colorito\Image\LayerInterface;

/**
 * Class LayerFactory
 */
class LayerFactory implements LayerFactoryInterface
{
    /**
     * @return LayerInterface
     */
    public function instanceLayer(): LayerInterface
    {
        return new Layer();
    }
}