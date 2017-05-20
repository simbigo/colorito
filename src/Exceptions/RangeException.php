<?php

declare(strict_types = 1);

namespace Simbigo\Colorito\Exceptions;

/**
 * Class RangeException
 */
class RangeException extends ColoritoException
{
    /**
     * RangeException constructor.
     *
     * @param string $offset
     */
    public function __construct($offset)
    {
        parent::__construct('Invalid offset ' . $offset);
    }
}
