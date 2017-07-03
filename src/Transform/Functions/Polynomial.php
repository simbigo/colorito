<?php

declare(strict_types = 1);

namespace Simbigo\Colorito\Transform\Functions;

use Imagick;

/**
 * Class Polynomial
 */
class Polynomial extends MathFunction
{
    /**
     * @var array
     */
    private $args;

    /**
     * Polynomial constructor.
     *
     * @param array ...$args
     */
    public function __construct(...$args)
    {
        $this->args = $args;
    }

    /**
     * @return array
     */
    public function getArguments(): array
    {
        return $this->args;
    }

    /**
     * @return int
     */
    public function getFunction(): int
    {
        return Imagick::FUNCTION_POLYNOMIAL;
    }
}