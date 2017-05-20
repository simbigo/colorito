<?php

declare(strict_types = 1);

namespace Simbigo\Colorito\Exceptions;

/**
 * Class EmptyCanvasException
 */
class EmptyCanvasException extends ColoritoException
{
    /**
     * EmptyCanvasException constructor.
     */
    public function __construct()
    {
        parent::__construct('Canvas can\'t be empty');
    }
}