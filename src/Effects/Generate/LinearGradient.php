<?php

declare(strict_types = 1);

namespace Simbigo\Colorito\Effects\Generate;

use Imagick;
use Simbigo\Colorito\Color;
use Simbigo\Colorito\Effects\EffectInterface;

/**
 * Class LinearGradient
 */
class LinearGradient implements EffectInterface
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
     * LinearGradient constructor.
     *
     * @param Color $startColor
     * @param Color $endColor
     */
    public function __construct(Color $startColor = null, Color $endColor = null)
    {
        $this->setStartColor($startColor);
        $this->setEndColor($endColor);
    }

    /**
     * @param Imagick $canvas
     * @return mixed
     */
    public function apply(Imagick $canvas)
    {
        $geometry = $canvas->getImageGeometry();
        $width = $geometry['width'];
        $height = $geometry['height'];
        $colors = [];
        if ($this->startColor !== null) {
            $colors[] = $this->startColor->getValue();
        }
        if ($this->endColor !== null) {
            $colors[] = $this->endColor->getValue();
        }
        $canvas->newPseudoImage($width, $height, 'gradient:' . implode('-', $colors));
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
    public function setEndColor(Color $endColor = null)
    {
        $this->endColor = $endColor;
    }

    /**
     * @param Color $startColor
     */
    public function setStartColor(Color $startColor = null)
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