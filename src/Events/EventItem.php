<?php
declare(strict_types=1);

namespace PrinsFrank\SunSetRise\Events;

use DateTimeImmutable;

class EventItem
{
    public function __construct(
        public readonly EventKey $eventKey,
        public readonly ?DateTimeImmutable $at,
    ) {
    }
}
