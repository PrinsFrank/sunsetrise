<?php
declare(strict_types=1);

namespace PrinsFrank\SunSetRise\Tests\Unit;

use PHPUnit\Framework\TestCase;
use PrinsFrank\SunSetRise\Exceptions\InvalidLatitudeException;
use PrinsFrank\SunSetRise\Exceptions\InvalidLongitudeException;
use PrinsFrank\SunSetRise\Position;

/**
 * @coversDefaultClass \PrinsFrank\SunsetRise\Position
 */
class PositionTest extends TestCase
{
    /**
     * @covers ::__construct()
     */
    public function testConstructThrowsExceptionOnTooHighLatitude(): void
    {
        $this->expectException(InvalidLatitudeException::class);
        new Position(91, 0);
    }

    /**
     * @covers ::__construct()
     */
    public function testConstructThrowsExceptionOnTooLowLatitude(): void
    {
        $this->expectException(InvalidLatitudeException::class);
        new Position(-91, 0);
    }

    /**
     * @covers ::__construct()
     */
    public function testConstructThrowsExceptionOnTooHighLongitude(): void
    {
        $this->expectException(InvalidLongitudeException::class);
        new Position(0, 181);
    }

    /**
     * @covers ::__construct()
     */
    public function testConstructThrowsExceptionOnTooLowLongitude(): void
    {
        $this->expectException(InvalidLongitudeException::class);
        new Position(0, -181);
    }

    /**
     * @covers ::__construct()
     */
    public function testConstructValidLatitudeLongiture(): void
    {
        $position = new Position(42.0, 43.0);
        static::assertSame(42.0, $position->latitude);
        static::assertSame(43.0, $position->longitude);
    }
}
