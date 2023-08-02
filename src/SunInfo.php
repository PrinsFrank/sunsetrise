<?php
declare(strict_types=1);

namespace PrinsFrank\SunSetRise;

use DateTimeImmutable;

class SunInfo
{
    public function __construct(
        public readonly ?DateTimeImmutable $sunrise,
        public readonly ?DateTimeImmutable $sunset,
        public readonly ?DateTimeImmutable $transit,
        public readonly ?DateTimeImmutable $civilTwilightStart,
        public readonly ?DateTimeImmutable $civilTwilightEnd,
        public readonly ?DateTimeImmutable $nauticalTwilightStart,
        public readonly ?DateTimeImmutable $nauticalTwilightEnd,
        public readonly ?DateTimeImmutable $astronomicalTwilightStart,
        public readonly ?DateTimeImmutable $astronomicalTwilightEnd,
    ) {
    }
}
