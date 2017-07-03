<?php

declare(strict_types = 1);

namespace Simbigo\Colorito\Image\Factory;

use Simbigo\Colorito\Image\LayerInterface;

/**
 * Interface LayerFactoryInterface
 */
interface LayerFactoryInterface
{
    /**
     * @return LayerInterface
     */
    public function instanceLayer(): LayerInterface;
}