<?php
declare(strict_types=1);

namespace PrinsFrank\SunSetRise\Equations;

use DateTimeImmutable;
use DateTimeZone;

class SolarTransit
{
    public static function calculate(float $meanSolarTime, float $solarMeanAnomaly, float $eclipticLongitude): float
    {
        return JulianDay::absoluteForDate(new DateTimeImmutable('2000-01-01 12:00', new DateTimeZone('UTC')))
            + $meanSolarTime
            + 0.0053 * sin($solarMeanAnomaly)
            - 0.0069 * sin(2 * $eclipticLongitude);
    }
}
