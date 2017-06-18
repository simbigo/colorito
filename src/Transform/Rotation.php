<?php

declare(strict_types = 1);

namespace Simbigo\Colorito\Transform;

use Imagick;

/**
 * Class Rotation
 */
class Rotation implements TransformationInterface
{
    /**
     * @var float the rotation value
     */
    private $degrees;

    /**
     * Rotation constructor.
     *
     * @param float $degrees
     */
    public function __construct(float $degrees)
    {
        $this->degrees = $degrees;
    }

    /**
     * @param Imagick $canvas
     * @return mixed
     */
    public function apply(Imagick $canvas)
    {
        $canvas->rotateImage('transparent', $this->degrees);
    }

    /**
     * @return float
     */
    public function getDegrees(): float
    {
        return $this->degrees;
    }

    /**
     * @param float $degrees
     */
    public function setDegrees(float $degrees)
    {
        $this->degrees = $degrees;
    }
}