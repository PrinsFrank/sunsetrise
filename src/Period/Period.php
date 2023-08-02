<?php
declare(strict_types=1);

namespace PrinsFrank\SunSetRise\Period;

use DateTimeImmutable;

class Period
{
    public function __construct(
        public readonly ?DateTimeImmutable $start,
        public readonly ?DateTimeImmutable $end,
        public readonly PeriodType $periodType,
    ) {
    }
}
