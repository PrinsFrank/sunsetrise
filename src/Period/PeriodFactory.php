<?php
declare(strict_types=1);

namespace PrinsFrank\SunSetRise\Period;

use PrinsFrank\SunSetRise\Events\EventItem;
use PrinsFrank\SunSetRise\Events\EventKey;
use PrinsFrank\SunSetRise\SunInfo;

class PeriodFactory
{
    /** @return array<Period> */
    public static function forSunInfo(SunInfo $sunInfo): array
    {
        $sortedEvents = array_filter(
            [
                new EventItem(EventKey::ASTRONOMICAL_TWILIGHT_START, $sunInfo->astronomicalTwilightStart),
                new EventItem(EventKey::NAUTICAL_TWILIGHT_START, $sunInfo->nauticalTwilightStart),
                new EventItem(EventKey::CIVIL_TWILIGHT_START, $sunInfo->civilTwilightStart),
                new EventItem(EventKey::SUNRISE, $sunInfo->sunrise),
                new EventItem(EventKey::SUNSET, $sunInfo->sunset),
                new EventItem(EventKey::CIVIL_TWILIGHT_END, $sunInfo->civilTwilightEnd),
                new EventItem(EventKey::NAUTICAL_TWILIGHT_END, $sunInfo->nauticalTwilightEnd),
                new EventItem(EventKey::ASTRONOMICAL_TWILIGHT_END, $sunInfo->astronomicalTwilightEnd),
            ],
            static function (EventItem $event) {
                return $event->at !== null;
            }
        );
        usort(
            $sortedEvents,
            static function (EventItem $first, EventItem $second) {
                return $first->at->getTimestamp() <=> $second->at->getTimestamp();
            }
        );

        $periods = [];
        foreach ($sortedEvents as $key => $event) {
            $periods[] = new Period($sortedEvents[$key - 1]?->at, $event->at, PeriodType::fromEventKeys($sortedEvents[$key - 1]->eventKey, $event->eventKey));
        }
        $periods[] = new Period($sortedEvents[count($sortedEvents) - 1]->at, null, PeriodType::fromEventKeys($sortedEvents[count($sortedEvents) - 1]->eventKey, $sortedEvents[count($sortedEvents)]->eventKey));

        return $periods;
    }
}
