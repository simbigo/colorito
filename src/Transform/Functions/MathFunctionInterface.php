<?php

declare(strict_types = 1);

namespace Simbigo\Colorito\Transform\Functions;

use Simbigo\Colorito\Transform\TransformationInterface;

/**
 * Interface MathFunctionInterface
 */
interface MathFunctionInterface extends TransformationInterface
{
    /**
     * @return array
     */
    public function getArguments(): array;

    /**
     * @return int
     */
    public function getFunction(): int;
}