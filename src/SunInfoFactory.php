<?php
declare(strict_types=1);

namespace PrinsFrank\SunSetRise;

use DateTimeImmutable;
use PrinsFrank\SunSetRise\Events\EventKey;

class SunInfoFactory
{
    public static function forPositionAndDateTime(Position $position, DateTimeImmutable $dateTimeImmutable): SunInfo
    {
        $dateSunInfo = date_sun_info($dateTimeImmutable->getTimestamp(), $position->latitude, $position->longitude);

        return new SunInfo(
            self::getDateTimeForKey($dateSunInfo, EventKey::SUNRISE),
            self::getDateTimeForKey($dateSunInfo, EventKey::SUNSET),
            self::getDateTimeForKey($dateSunInfo, EventKey::TRANSIT),
            self::getDateTimeForKey($dateSunInfo, EventKey::CIVIL_TWILIGHT_START),
            self::getDateTimeForKey($dateSunInfo, EventKey::CIVIL_TWILIGHT_END),
            self::getDateTimeForKey($dateSunInfo, EventKey::NAUTICAL_TWILIGHT_START),
            self::getDateTimeForKey($dateSunInfo, EventKey::NAUTICAL_TWILIGHT_END),
            self::getDateTimeForKey($dateSunInfo, EventKey::ASTRONOMICAL_TWILIGHT_START),
            self::getDateTimeForKey($dateSunInfo, EventKey::ASTRONOMICAL_TWILIGHT_END),
        );
    }

    private static function getDateTimeForKey(array $dateSunInfo, EventKey $dateSunInfoKey): ?DateTimeImmutable
    {
        return is_int($dateSunInfo[$dateSunInfoKey->value]) ? new DateTimeImmutable('@' . $dateSunInfo[$dateSunInfoKey->value]) : null;
    }
}
