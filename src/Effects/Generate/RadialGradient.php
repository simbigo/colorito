<?php

declare(strict_types = 1);

namespace Simbigo\Colorito\Effects\Generate;

use Imagick;
use Simbigo\Colorito\Color;
use Simbigo\Colorito\Effects\EffectInterface;

/**
 * Class RadialGradient
 */
class RadialGradient implements EffectInterface
{
    /**
     * @var Color
     */
    private $endColor;
    /**
     * @var Color
     */
    private $startColor;

    /**
     * RadialGradient constructor.
     *
     * @param Color $startColor
     * @param Color $endColor
     */
    public function __construct(Color $startColor, Color $endColor)
    {
        $this->setStartColor($startColor);
        $this->setEndColor($endColor);
    }

    /**
     * @param Imagick $canvas
     */
    public function apply(Imagick $canvas)
    {
        $geometry = $canvas->getImageGeometry();
        $width = $geometry['width'];
        $height = $geometry['height'];
        $colors = [$this->startColor->getValue(), $this->endColor->getValue()];
        $canvas->newPseudoImage($width, $height, 'radial-gradient:' . implode('-', $colors));
    }

    /**
     * @return Color
     */
    public function getEndColor(): Color
    {
        return $this->endColor;
    }

    /**
     * @return Color
     */
    public function getStartColor(): Color
    {
        return $this->startColor;
    }

    /**
     * @param Color $endColor
     */
    public function setEndColor(Color $endColor)
    {
        $this->endColor = $endColor;
    }

    /**
     * @param Color $startColor
     */
    public function setStartColor(Color $startColor)
    {
        $this->startColor = $startColor;
    }

    /**
     *
     */
    public function swapColors()
    {
        $start = $this->getStartColor();
        $this->setStartColor($this->getEndColor());
        $this->setEndColor($start);
    }
}