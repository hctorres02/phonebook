<?php

namespace App\Helpers;

final class CustomerStatus
{
    public const STATUS_NEW = 1;

    public const STATUS_ACTIVE = 2;

    public const STATUS_SUSPENDED = 3;

    public const STATUS_CANCELLED = 127;

    public static function toArray(): array
    {
        return [
            self::STATUS_NEW,
            self::STATUS_ACTIVE,
            self::STATUS_SUSPENDED,
            self::STATUS_CANCELLED,
        ];
    }
}
