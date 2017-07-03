<?php

declare(strict_types = 1);

namespace Simbigo\Colorito\Effects\Distort;

use Imagick;
use Simbigo\Colorito\Effects\EffectInterface;

/**
 * Class Twirl
 *
 * The effect swirls the pixels about the center of the image, where degrees
 * indicates the sweep of the arc through which each pixel is moved. You get
 * a more dramatic effect as the degrees move from 1 to 360.
 */
class Twirl implements EffectInterface
{
    /**
     * @var int the degrees to move (from 1 to 360)
     */
    private $angle;

    /**
     * Twirl constructor.
     *
     * @param int $angle
     */
    public function __construct(int $angle)
    {
        $this->setAngle($angle);
    }

    /**
     * Normalize degrees value to value from 0 to 360
     *
     * @param int $value
     * @return int
     */
    protected function normalizeValue(int $value): int
    {
        $normalized = $value;
        if ($value < 0) {
            $normalized = 0;
        } elseif ($value > 360) {
            $normalized = $value % 360;
        }
        return $normalized;
    }

    /**
     * @param Imagick $canvas
     * @return void
     */
    public function apply(Imagick $canvas)
    {
        $canvas->swirlImage($this->getAngle());
    }

    /**
     * Return the degrees value
     *
     * @return int
     */
    public function getAngle(): int
    {
        return $this->angle;
    }

    /**
     * Setup the degrees to move (from 1 to 360)
     *
     * @var int $angle the degrees to move (from 1 to 360)
     */
    public function setAngle(int $angle)
    {
        $this->angle = $this->normalizeValue($angle);
    }
}
