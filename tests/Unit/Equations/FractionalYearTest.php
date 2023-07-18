<?php
declare(strict_types=1);

namespace PrinsFrank\SunSetRise\Tests\Unit\Equations;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use PrinsFrank\SunSetRise\Equations\FractionalYear;

/**
 * @coversDefaultClass \PrinsFrank\SunSetRise\Equations\FractionalYear
 */
class FractionalYearTest extends TestCase
{
    /**
     * @covers ::forDate
     */
    public function testForDate(): void
    {
        static::assertEquals(0.0, FractionalYear::forDate(new DateTimeImmutable('2023-01-01 12:00:00')));
        static::assertEquals(M_PI, FractionalYear::forDate(new DateTimeImmutable('2023-07-03 00:00:00')));
        static::assertEqualsWithDelta(2 * M_PI, FractionalYear::forDate(new DateTimeImmutable('2024-01-01 11:59:59.999')), 0.001);
    }
}
