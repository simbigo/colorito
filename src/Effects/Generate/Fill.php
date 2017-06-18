<?php

declare(strict_types = 1);

namespace Simbigo\Colorito\Effects\Generate;

use Imagick;
use ImagickDraw;
use ImagickPixel;
use Simbigo\Colorito\Color;
use Simbigo\Colorito\Effects\EffectInterface;

/**
 * Class Fill
 */
class Fill implements EffectInterface
{
    /**
     * @var Color
     */
    private $color;
    /**
     * @var float value between 0 and 1
     */
    private $opacity = 1;

    /**
     * Fill constructor.
     *
     * @param Color $color
     * @param float $opacity
     */
    public function __construct(Color $color, float $opacity = 1.0)
    {
        $this->setColor($color);
        $this->setOpacity($opacity);
    }

    /**
     * @param Imagick $canvas
     * @return mixed
     */
    public function apply(Imagick $canvas)
    {
        $draw = new ImagickDraw();
        $draw->setFillColor(new ImagickPixel($this->color->getValue()));

        if ($this->opacity < 1) {
            $draw->setFillOpacity($this->opacity);
        }

        $geometry = $canvas->getImageGeometry();
        $width = $geometry['width'];
        $height = $geometry['height'];

        $draw->rectangle(0, 0, $width, $height);

        return $canvas->drawImage($draw);
    }

    /**
     * @return Color
     */
    public function getColor(): Color
    {
        return $this->color;
    }

    /**
     * @return float
     */
    public function getOpacity(): float
    {
        return $this->opacity;
    }

    /**
     * @param Color $color
     * @return $this
     */
    public function setColor(Color $color)
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @param float $opacity
     * @return $this
     */
    public function setOpacity(float $opacity)
    {
        $opacity = (float)$opacity;
        if ($opacity > 1) {
            $opacity = 1;
        }
        if ($opacity < 0) {
            $opacity = 0;
        }

        $this->opacity = $opacity;
        return $this;
    }
}