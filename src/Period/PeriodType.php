<?php
declare(strict_types=1);

namespace PrinsFrank\SunSetRise\Period;

use PrinsFrank\SunSetRise\Events\EventKey;
use PrinsFrank\SunSetRise\Exceptions\UnknownPeriod;

enum PeriodType
{
    /** Defined as when the sun is 0 or more degrees above the horizon */
    case Day;

    /** Defined as when the sun is between 0 and 6 degrees below the horizon */
    case Civil_Twilight;

    /** Defined as when the sun is between 6 and 12 degrees below the horizon */
    case Nautical_Twilight;

    /** Defined as when the sun is between 12 and 18 degrees below the horizon */
    case Astronomical_Twilight;

    /** Defined as when the sun is more than 18 degrees below the horizon */
    case Night;

    /** @throws UnknownPeriod */
    public static function fromEventKeys(?EventKey $startEventKey, ?EventKey $endEventKey): self
    {
        return match ([$startEventKey, $endEventKey]) {
            [null, EventKey::ASTRONOMICAL_TWILIGHT_START] => self::Night,
            [EventKey::ASTRONOMICAL_TWILIGHT_START, EventKey::NAUTICAL_TWILIGHT_START] => self::Astronomical_Twilight,
            [EventKey::NAUTICAL_TWILIGHT_START, EventKey::CIVIL_TWILIGHT_START] => self::Nautical_Twilight,
            [EventKey::CIVIL_TWILIGHT_START, EventKey::SUNRISE] => self::Civil_Twilight,
            [EventKey::SUNRISE, EventKey::SUNSET] => self::Day,
            [EventKey::SUNSET, EventKey::CIVIL_TWILIGHT_END] => self::Civil_Twilight,
            [EventKey::CIVIL_TWILIGHT_END, EventKey::NAUTICAL_TWILIGHT_END] => self::Nautical_Twilight,
            [EventKey::NAUTICAL_TWILIGHT_END, EventKey::ASTRONOMICAL_TWILIGHT_END] => self::Astronomical_Twilight,
            [EventKey::ASTRONOMICAL_TWILIGHT_END, EventKey::ASTRONOMICAL_TWILIGHT_START] => self::Night,
            [EventKey::ASTRONOMICAL_TWILIGHT_END, null] => self::Night,
            default => throw new UnknownPeriod('No period between event "' . $startEventKey?->name . '" and "' . $endEventKey?->name . '"')
        };
    }
}
