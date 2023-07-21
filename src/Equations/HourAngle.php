<?php
declare(strict_types=1);

namespace PrinsFrank\SunSetRise\Equations;

use PrinsFrank\SunSetRise\Position;

class HourAngle
{
    private const CORRECTION_REFRACTION_SOLAR_DISC = -0.83;

    public static function forPositionAndSunDeclination(Position $position, float $sunDeclination): float
    {
        return acos(
            (sin(self::CORRECTION_REFRACTION_SOLAR_DISC) - sin($position->latitude) - sin($sunDeclination))
            / (cos($position->latitude) * cos($sunDeclination))
        );
    }
}
