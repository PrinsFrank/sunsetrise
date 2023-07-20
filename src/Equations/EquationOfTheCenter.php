<?php
declare(strict_types=1);

namespace PrinsFrank\SunSetRise\Equations;

class EquationOfTheCenter
{
    private const COEFFICIENT_EARTH = 1.9148;

    public static function forSolarMeanAnomaly(float $solarMeanAnomaly): float
    {
        return self::COEFFICIENT_EARTH * sin($solarMeanAnomaly)
            + 0.02 * sin(2 * $solarMeanAnomaly)
            + 0.0003 * sin(3 * $solarMeanAnomaly);
    }
}
