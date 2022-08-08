<?php

namespace App\Helpers;

final class CustomerStatus
{
    public const STATUS_NEW = 1;

    public const STATUS_ACTIVE = 2;

    public const STATUS_SUSPENDED = 3;

    public const STATUS_CANCELLED = 127;

    public static function toArray($onlyKeys = true): array
    {
        $map = [
            self::STATUS_NEW => 'Novo',
            self::STATUS_ACTIVE => 'Ativo',
            self::STATUS_SUSPENDED => 'Suspenso',
            self::STATUS_CANCELLED => 'Cancelado',
        ];

        if ($onlyKeys) {
            return array_keys($map);
        }

        return $map;
    }
}
