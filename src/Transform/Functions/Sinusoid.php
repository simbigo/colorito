<?php

declare(strict_types = 1);

namespace Simbigo\Colorito\Transform\Functions;

use Imagick;

/**
 * Class Sinusoid
 *
 * value = ampl * sin(2*PI( freq*value + phase/360 ) ) + bias
 */
class Sinusoid extends MathFunction
{
    /**
     * @var
     */
    private $amplitude;
    /**
     * @var
     */
    private $bias;
    /**
     * @var
     */
    private $frequency;
    /**
     * @var
     */
    private $phase;

    /**
     * Sinusoid constructor.
     *
     * @param $frequency
     * @param $phase
     * @param $amplitude
     * @param $bias
     */
    public function __construct($frequency = 1, $phase = null, $amplitude = null, $bias = null)
    {
        $this->frequency = $frequency;
        $this->phase = $phase;
        $this->amplitude = $amplitude;
        $this->bias = $bias;
    }

    /**
     * @return mixed
     */
    public function getAmplitude()
    {
        return $this->amplitude;
    }

    /**
     * @return array
     */
    public function getArguments(): array
    {
        $arguments = [
            $this->getFrequency(),
            $this->getPhase(),
            $this->getAmplitude(),
            $this->getBias(),
        ];
        return array_filter($arguments, function ($value) {
            return $value !== null;
        });
    }

    /**
     * @return mixed
     */
    public function getBias()
    {
        return $this->bias;
    }

    /**
     * @return mixed
     */
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * @return int
     */
    public function getFunction(): int
    {
        return Imagick::FUNCTION_SINUSOID;
    }

    /**
     * @return mixed
     */
    public function getPhase()
    {
        return $this->phase;
    }

    /**
     * @param mixed $amplitude
     */
    public function setAmplitude($amplitude)
    {
        $this->amplitude = $amplitude;
    }

    /**
     * @param mixed $bias
     */
    public function setBias($bias)
    {
        $this->bias = $bias;
    }

    /**
     * @param mixed $frequency
     */
    public function setFrequency($frequency)
    {
        $this->frequency = $frequency;
    }

    /**
     * @param mixed $phase
     */
    public function setPhase($phase)
    {
        $this->phase = $phase;
    }
}