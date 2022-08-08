<?php

namespace App\Helpers;

final class NumberStatus
{
    public const STATUS_ACTIVE = 1;

    public const STATUS_INACTIVE = 2;

    public const STATUS_CANCELLED = 127;

    public static function toArray(): array
    {
        return [
            self::STATUS_ACTIVE,
            self::STATUS_INACTIVE,
            self::STATUS_CANCELLED,
        ];
    }
}
