<?php
declare(strict_types=1);

namespace PrinsFrank\SunSetRise\Tests\Unit\SunInfoDate;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use PrinsFrank\SunSetRise\Position;
use PrinsFrank\SunSetRise\SunInfo\SunInfo;
use PrinsFrank\SunSetRise\SunInfo\SunInfoFactory;

/**
 * @coversDefaultClass \PrinsFrank\SunSetRise\SunInfo\SunInfoFactory
 */
class SunInfoFactoryTest extends TestCase
{
    /**
     * @covers ::forPositionAndDateTime
     */
    public function testForPositionAndDateTimeImmutablePolarNight(): void
    {
        static::assertEquals(
            new SunInfo(
                null,
                null,
                new DateTimeImmutable('2022-12-23T10:56:31.000000+0000'),
                null,
                null,
                new DateTimeImmutable('2022-12-23T09:58:27.000000+0000'),
                new DateTimeImmutable('2022-12-23T11:54:35.000000+0000'),
                new DateTimeImmutable('2022-12-23T06:37:56.000000+0000'),
                new DateTimeImmutable('2022-12-23T15:15:06.000000+0000'),
            ),
            SunInfoFactory::forPositionAndDateTime(new Position(78.2232, 15.6267), new DateTimeImmutable('2022-12-23'))
        );
    }

    /**
     * @covers ::forPositionAndDateTime
     */
    public function testForPositionAndDateTimeImmutableMidnightSun(): void
    {
        static::assertEquals(
            new SunInfo(
                null,
                null,
                new DateTimeImmutable('2023-06-20T10:59:01.000000+0000'),
                null,
                null,
                null,
                null,
                null,
                null,
            ),
            SunInfoFactory::forPositionAndDateTime(new Position(78.2232, 15.6267), new DateTimeImmutable('2023-06-20'))
        );
    }
}
