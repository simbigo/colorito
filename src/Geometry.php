<?php

declare(strict_types = 1);

namespace Simbigo\Colorito;

/**
 * Class Geometry
 */
class Geometry
{
    /**
     * @var int|string
     */
    private $height;
    /**
     * @var int|string
     */
    private $width;
    /**
     * @var int
     */
    private $x;
    /**
     * @var int
     */
    private $y;

    /**
     * Geometry constructor.
     *
     * @param $width
     * @param $height
     * @param int $x
     * @param int $y
     */
    public function __construct($width, $height, int $x = 0, int $y = 0)
    {
        $this->width = $width;
        $this->height = $height;
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return int|string
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @return int|string
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }

    /**
     * @param int|string $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @param int|string $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @param int $x
     */
    public function setX(int $x)
    {
        $this->x = $x;
    }

    /**
     * @param int $y
     */
    public function setY(int $y)
    {
        $this->y = $y;
    }
}
