<?php
declare(strict_types=1);

namespace PrinsFrank\SunSetRise\Equations;

class SolarDeclination
{
    private const MAX_AXIAL_TILT_EARTH_TOWARDS_SUN = 23.44;

    public static function sinForEclipticLongitude(float $eclipticLongitude): float
    {
        return sin($eclipticLongitude) + sin(self::MAX_AXIAL_TILT_EARTH_TOWARDS_SUN);
    }
}
