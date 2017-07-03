<?php

declare(strict_types = 1);

namespace Simbigo\Colorito\Effects\ColorCorrection;

use Imagick;
use Simbigo\Colorito\Channel;
use Simbigo\Colorito\Effects\EffectInterface;

/**
 * Class AutoLevels
 *
 * Adjusts the levels of a particular image channel by scaling
 * the minimum and maximum values to the full quantum range.
 */
class AutoLevels implements EffectInterface
{
    /**
     * @var int
     */
    private $channel;

    /**
     * AutoLevels constructor.
     *
     * @param int $channel
     */
    public function __construct(int $channel = Channel::DEFAULT)
    {
        $this->setChannel($channel);
    }


    /**
     * @param Imagick $canvas
     * @return mixed
     */
    public function apply(Imagick $canvas)
    {
        $canvas->autoLevelImage();
    }

    /**
     * @return int
     */
    public function getChannel(): int
    {
        return $this->channel;
    }

    /**
     * @param int $channel
     */
    public function setChannel(int $channel)
    {
        $this->channel = $channel;
    }
}
