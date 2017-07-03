<?php

declare(strict_types = 1);

namespace Simbigo\Colorito;

use Imagick;

/**
 * Class Channel
 */
class Channel
{
    const ALL = Imagick::CHANNEL_ALL;
    const ALPHA = Imagick::CHANNEL_ALPHA;
    const BLACK = Imagick::CHANNEL_BLACK;
    const BLUE = Imagick::CHANNEL_BLUE;
    const CYAN = Imagick::CHANNEL_CYAN;
    const DEFAULT = Imagick::CHANNEL_DEFAULT;
    const GRAY = Imagick::CHANNEL_GRAY;
    const GREEN = Imagick::CHANNEL_GREEN;
    const INDEX = Imagick::CHANNEL_INDEX;
    const MAGENTA = Imagick::CHANNEL_MAGENTA;
    const MATTE = Imagick::CHANNEL_MATTE;
    const OPACITY = Imagick::CHANNEL_OPACITY;
    const RED = Imagick::CHANNEL_RED;
    const UNDEFINED = Imagick::CHANNEL_UNDEFINED;
    const YELLOW = Imagick::CHANNEL_YELLOW;
}
