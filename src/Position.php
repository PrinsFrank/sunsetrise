<?php
declare(strict_types=1);

namespace PrinsFrank\SunSetRise;

use PrinsFrank\SunSetRise\Exceptions\InvalidLatitudeException;
use PrinsFrank\SunSetRise\Exceptions\InvalidLongitudeException;

class Position
{
    /**
     * @throws InvalidLatitudeException
     * @throws InvalidLongitudeException
     */
    public function __construct(
        public readonly float $latitude,
        public readonly float $longitude,
    ) {
        if ($this->latitude < -90.0 || $this->latitude > 90.0) {
            throw new InvalidLatitudeException();
        }
        if ($this->longitude < -180.0 || $this->longitude > 180.0) {
            throw new InvalidLongitudeException();
        }
    }
}
