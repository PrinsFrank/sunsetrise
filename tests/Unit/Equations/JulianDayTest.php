<?php
declare(strict_types=1);

namespace PrinsFrank\SunSetRise\Tests\Unit\Equations;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use PrinsFrank\SunSetRise\Equations\JulianDay;

/**
 * @coversDefaultClass \PrinsFrank\SunSetRise\Equations\JulianDay
 */
class JulianDayTest extends TestCase
{
    /**
     * @covers ::absoluteForDate
     */
    public function testGetForDay(): void
    {
        $UTC = new \DateTimeZone('UTC');
        static::assertSame(2451544.5, JulianDay::absoluteForDate(new DateTimeImmutable('2000-01-01', $UTC)));
        static::assertSame(2451545.0, JulianDay::absoluteForDate(new DateTimeImmutable('2000-01-01 12:00', $UTC)));
        static::assertSame(2460145.5, JulianDay::absoluteForDate(new DateTimeImmutable('2023-07-20', $UTC)));
        static::assertSame(2460146.0, JulianDay::absoluteForDate(new DateTimeImmutable('2023-07-20 12:00', $UTC)));

        $other = new \DateTimeZone('Etc/GMT+12');
        static::assertSame(2451545.0, JulianDay::absoluteForDate(new DateTimeImmutable('2000-01-01', $other)));
        static::assertSame(2451545.5, JulianDay::absoluteForDate(new DateTimeImmutable('2000-01-01 12:00', $other)));
        static::assertSame(2460146.0, JulianDay::absoluteForDate(new DateTimeImmutable('2023-07-20', $other)));
        static::assertSame(2460146.5, JulianDay::absoluteForDate(new DateTimeImmutable('2023-07-20 12:00', $other)));
    }

    /**
     * @covers ::tTDaysSinceJan1st2000ForDate
     */
    public function testTTDaysSinceJan1st2000ForDate(): void
    {
        $UTC = new \DateTimeZone('UTC');
        static::assertEqualsWithDelta(-0.4991, JulianDay::tTDaysSinceJan1st2000ForDate(new DateTimeImmutable('2000-01-01', $UTC)), 0.0001);
        static::assertEqualsWithDelta(0.0008, JulianDay::tTDaysSinceJan1st2000ForDate(new DateTimeImmutable('2000-01-01 12:00', $UTC)), 0.0001);
        static::assertEqualsWithDelta(8600.5008, JulianDay::tTDaysSinceJan1st2000ForDate(new DateTimeImmutable('2023-07-20', $UTC)), 0.0001);
        static::assertEqualsWithDelta(8601.0008, JulianDay::tTDaysSinceJan1st2000ForDate(new DateTimeImmutable('2023-07-20 12:00', $UTC)), 0.0001);

        $other = new \DateTimeZone('Etc/GMT+12');
        static::assertEqualsWithDelta(0.0008, JulianDay::tTDaysSinceJan1st2000ForDate(new DateTimeImmutable('2000-01-01', $other)), 0.0001);
        static::assertEqualsWithDelta(0.5008, JulianDay::tTDaysSinceJan1st2000ForDate(new DateTimeImmutable('2000-01-01 12:00', $other)), 0.0001);
        static::assertEqualsWithDelta(8601.0008, JulianDay::tTDaysSinceJan1st2000ForDate(new DateTimeImmutable('2023-07-20', $other)), 0.0001);
        static::assertEqualsWithDelta(8601.5008, JulianDay::tTDaysSinceJan1st2000ForDate(new DateTimeImmutable('2023-07-20 12:00', $other)), 0.0001);
    }
}
