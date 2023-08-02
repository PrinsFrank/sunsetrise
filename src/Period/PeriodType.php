<?php
declare(strict_types=1);

namespace PrinsFrank\SunSetRise\Period;

enum PeriodType
{
    /** Defined as when the sun is 0 or more degrees above the horizon */
    case Day;

    /** Defined as when the sun is between 0 and 6 degrees below the horizon */
    case Civil_Twilight;

    /** Defined as when the sun is between 6 and 12 degrees below the horizon */
    case Nautical_Twilight;

    /** Defined as when the sun is between 12 and 18 degrees below the horizon */
    case Astronomical_Twilight;

    /** Defined as when the sun is more than 18 degrees below the horizon */
    case Night;
}
