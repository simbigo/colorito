<?php

declare(strict_types=1);

namespace Simbigo\Colorito;

class Gravity
{
    const CENTER = 'Center';
    const EAST = 'East';
    const NORTH = 'North';
    const NORTH_EAST = 'NorthEast';
    const NORTH_WEST = 'NorthWest';
    const SOUTH = 'South';
    const SOUTH_EAST = 'SouthEast';
    const SOUTH_WEST = 'SouthWest';
    const WEST = 'West';

    private $value;

    public function __construct($gravityValue)
    {
        $this->value = $gravityValue;
    }

    protected function repositionCenter(Geometry $target, Geometry $base)
    {

    }

    protected function repositionEast(Geometry $target, Geometry $base)
    {

    }

    protected function repositionNorth(Geometry $target, Geometry $base)
    {

    }

    protected function repositionNorthEast(Geometry $target, Geometry $base)
    {

    }

    protected function repositionNorthWest(Geometry $target, Geometry $base)
    {

    }

    protected function repositionSouth(Geometry $target, Geometry $base)
    {

    }

    protected function repositionSouthEast(Geometry $target, Geometry $base)
    {

    }

    protected function repositionSouthWest(Geometry $target, Geometry $base)
    {

    }

    protected function repositionWest(Geometry $target, Geometry $base)
    {

    }

    public function reposition(Geometry $target, Geometry $base)
    {

    }
}
