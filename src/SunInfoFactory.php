<?php
declare(strict_types=1);

namespace PrinsFrank\SunSetRise;

use DateTimeImmutable;
use PrinsFrank\SunSetRise\Support\DateSunInfoKey;

class SunInfoFactory
{
    public static function forPositionAndDateTime(Position $position, DateTimeImmutable $dateTimeImmutable): SunInfo
    {
        $dateSunInfo = date_sun_info($dateTimeImmutable->getTimestamp(), $position->latitude, $position->longitude);

        return new SunInfo(
            self::getDateTimeForKey($dateSunInfo, DateSunInfoKey::SUNRISE),
            self::getDateTimeForKey($dateSunInfo, DateSunInfoKey::SUNSET),
            self::getDateTimeForKey($dateSunInfo, DateSunInfoKey::TRANSIT),
            self::getDateTimeForKey($dateSunInfo, DateSunInfoKey::CIVIL_TWILIGHT_START),
            self::getDateTimeForKey($dateSunInfo, DateSunInfoKey::CIVIL_TWILIGHT_END),
            self::getDateTimeForKey($dateSunInfo, DateSunInfoKey::NAUTICAL_TWILIGHT_START),
            self::getDateTimeForKey($dateSunInfo, DateSunInfoKey::NAUTICAL_TWILIGHT_END),
            self::getDateTimeForKey($dateSunInfo, DateSunInfoKey::ASTRONOMICAL_TWILIGHT_START),
            self::getDateTimeForKey($dateSunInfo, DateSunInfoKey::ASTRONOMICAL_TWILIGHT_END),
        );
    }

    private static function getDateTimeForKey(array $dateSunInfo, DateSunInfoKey $dateSunInfoKey): ?DateTimeImmutable
    {
        return is_int($dateSunInfo[$dateSunInfoKey->value]) ? new DateTimeImmutable('@' . $dateSunInfo[$dateSunInfoKey->value]) : null;
    }
}
