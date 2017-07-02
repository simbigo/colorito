<?php

declare(strict_types = 1);

namespace Simbigo\Colorito\Transform\Functions;

use Imagick;

abstract class MathFunction implements MathFunctionInterface
{
    const POLYNOMIAL = Imagick::FUNCTION_POLYNOMIAL;
    const SINUSOID = Imagick::FUNCTION_SINUSOID;
    const UNDEFINED = Imagick::FUNCTION_UNDEFINED;

    public function apply(Imagick $canvas)
    {
        $canvas->functionImage($this->getFunction(), $this->getArguments());
    }
}