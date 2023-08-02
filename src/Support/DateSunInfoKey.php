<?php
declare(strict_types=1);

namespace PrinsFrank\SunSetRise\Support;

enum DateSunInfoKey: string
{
    case SUNRISE = 'sunrise';
    case SUNSET = 'sunset';
    case TRANSIT = 'transit';
    case CIVIL_TWILIGHT_START = 'civil_twilight_begin';
    case CIVIL_TWILIGHT_END = 'civil_twilight_END';
    case NAUTICAL_TWILIGHT_START = 'nautical_twilight_begin';
    case NAUTICAL_TWILIGHT_END = 'nautical_twilight_end';
    case ASTRONOMICAL_TWILIGHT_START = 'astronomical_twilight_begin';
    case ASTRONOMICAL_TWILIGHT_END = 'astronomical_twilight_end';
}
