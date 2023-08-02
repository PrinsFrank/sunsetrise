<?php
declare(strict_types=1);

namespace PrinsFrank\SunSetRise\Tests\Feature;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use PrinsFrank\SunSetRise\Equations\EclipticLongitude;
use PrinsFrank\SunSetRise\Equations\EquationOfTheCenter;
use PrinsFrank\SunSetRise\Equations\HourAngle;
use PrinsFrank\SunSetRise\Equations\JulianDay;
use PrinsFrank\SunSetRise\Equations\MeanSolarTime;
use PrinsFrank\SunSetRise\Equations\SolarDeclination;
use PrinsFrank\SunSetRise\Equations\SolarMeanAnomaly;
use PrinsFrank\SunSetRise\Equations\SolarTransit;
use PrinsFrank\SunSetRise\Equations\Sunrise;
use PrinsFrank\SunSetRise\Equations\Sunset;
use PrinsFrank\SunSetRise\Position;

class SunSetRiseTest extends TestCase
{
    public function testSunSetRise(): void
    {
        $position = new Position(41.0082, 28.9784);
        $dateTime = new DateTimeImmutable('2023-07-20 00:00');
        $meanSolarTime = MeanSolarTime::forTimeAndPosition($dateTime, $position);
        $solarMeanAnomaly = SolarMeanAnomaly::forMeanSolarTime($meanSolarTime);
        $equationOfTheCenter = EquationOfTheCenter::forSolarMeanAnomaly($solarMeanAnomaly);
        $eclipticLongitude = EclipticLongitude::forSolarMeanAnomalyAndEquationOfTheCenter($solarMeanAnomaly, $equationOfTheCenter);
        $solarTransit = SolarTransit::calculate($meanSolarTime, $solarMeanAnomaly, $eclipticLongitude);
        $sunDeclination = SolarDeclination::forEclipticLongitude($eclipticLongitude);
        $hourAngle = HourAngle::forPositionAndSunDeclination($position, $sunDeclination);
        $sunrise = Sunrise::forSolarTransitAndHourAngle($solarTransit, $hourAngle);
        static::assertSame(42, JulianDay::toDateTimeImmutable($sunrise));
    }
}
