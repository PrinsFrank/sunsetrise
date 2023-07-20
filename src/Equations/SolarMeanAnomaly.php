<?php
declare(strict_types=1);

namespace PrinsFrank\SunSetRise\Equations;

class SolarMeanAnomaly
{
    private const MEAN_ANOMALY_ON_JAN_1ST_2000 = 357.5291;

    private const CHANGE_IN_MEAN_ANOMALY_PER_DAY = 0.98560028;

    public static function forMeanSolarTime(float $meanSolarTime): float
    {
        return (self::MEAN_ANOMALY_ON_JAN_1ST_2000 + $meanSolarTime * self::CHANGE_IN_MEAN_ANOMALY_PER_DAY) % 360;
    }
}
