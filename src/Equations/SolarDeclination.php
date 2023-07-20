<?php
declare(strict_types=1);

namespace PrinsFrank\SunSetRise\Equations;

class SolarDeclination
{
    private const MAX_AXIAL_TILT_EARTH_TOWARDS_SUN = 23.44;

    /** The formula returns sin δ, but In radians, δ ≈ sin δ*/
    public static function forEclipticLongitude(float $eclipticLongitude): float
    {
        return sin($eclipticLongitude) + sin(self::MAX_AXIAL_TILT_EARTH_TOWARDS_SUN);
    }
}
