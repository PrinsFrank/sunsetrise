<?php
declare(strict_types=1);

namespace PrinsFrank\SunSetRise\Equations;

use DateInterval;
use DateTimeImmutable;

class FractionalYear
{
    public static function forDate(DateTimeImmutable $dateTime): float
    {
        $solarDate = $dateTime->sub(new DateInterval('PT12H'));

        $isLeapYear           = (bool) $solarDate->format('L');
        $dayInYearZeroIndexed = (int) $solarDate->format('z');
        $hourOfDay            = (int) $solarDate->format('H');

        return 2 * M_PI
            / ($isLeapYear ? 366 : 365)
            * ($dayInYearZeroIndexed + ($hourOfDay / 24));
    }
}
