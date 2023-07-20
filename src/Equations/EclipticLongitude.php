<?php
declare(strict_types=1);

namespace PrinsFrank\SunSetRise\Equations;

class EclipticLongitude
{
    private const ARGUMENT_OF_PERIHELION = 102.9372;

    public static function forSolarMeanAnomalyAndEquationOfTheCenter(float $solarMeanAnomaly, float $equationOfTheCenter): float
    {
        return ($solarMeanAnomaly + $equationOfTheCenter + 180 + self::ARGUMENT_OF_PERIHELION) % 360;
    }
}
