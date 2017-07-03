<?php

declare(strict_types = 1);

namespace Simbigo\Colorito\Image\Factory;

use Simbigo\Colorito\Image\LayerInterface;

/**
 * Class CallableFactory
 */
class CallableFactory implements LayerFactoryInterface
{
    /**
     * @var callable
     */
    private $callback;

    /**
     * CallableFactory constructor.
     *
     * @param callable $callback
     */
    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    /**
     * @return LayerInterface
     */
    public function instanceLayer(): LayerInterface
    {
        return call_user_func($this->callback);
    }
}