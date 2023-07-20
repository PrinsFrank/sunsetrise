<?php
declare(strict_types=1);

namespace PrinsFrank\SunSetRise\Equations;

use DateTimeImmutable;
use DateTimeZone;
use RuntimeException;

class JulianDay
{
    private const SECONDS_IN_DAY = 60 * 60 * 24;
    /** Julian day starts at 12:00 */
    private const OFFSET_JULLIAN_DAY = -0.5;
    private const TT_LAG_IN_SECONDS = 69.184;

    public static function absoluteForDate(DateTimeImmutable $dateTime): float
    {
        $julianDay = unixtojd($dateTime->getTimestamp());
        if ($julianDay === false) {
            throw new RuntimeException('Unable to convert date to Julian Day');
        }

        return $julianDay + self::OFFSET_JULLIAN_DAY + ($dateTime->getTimestamp() % self::SECONDS_IN_DAY) / self::SECONDS_IN_DAY;
    }

    public static function tTDaysSinceJan1st2000ForDate(DateTimeImmutable $dateTimeImmutable): float
    {
        return self::absoluteForDate($dateTimeImmutable)
            - self::absoluteForDate(new DateTimeImmutable('2000-01-01 12:00', new DateTimeZone('UTC')))
            + (self::TT_LAG_IN_SECONDS / self::SECONDS_IN_DAY);
    }
}
