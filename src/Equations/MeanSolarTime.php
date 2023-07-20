<?php
declare(strict_types=1);

namespace PrinsFrank\SunSetRise\Equations;

use DateTimeImmutable;
use PrinsFrank\SunSetRise\Position;

class MeanSolarTime
{
    public static function forTimeAndPosition(DateTimeImmutable $dateTime, Position $position): float
    {
        return JulianDay::tTDaysSinceJan1st2000ForDate($dateTime) - ($position->longitude / 360);
    }
}
