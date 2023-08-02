<?php
declare(strict_types=1);

namespace PrinsFrank\SunSetRise\Equations;

class Sunrise
{
    public static function forSolarTransitAndHourAngle(float $solarTransit, float $hourAngle): float
    {
        return $solarTransit - ($hourAngle / 360);
    }
}
