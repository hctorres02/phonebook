<?php

namespace App\Helpers;

final class NumberStatus
{
    public const STATUS_ACTIVE = 1;

    public const STATUS_INACTIVE = 2;

    public const STATUS_CANCELLED = 127;

    public static function toArray($onlyKeys = true): array
    {
        $map = [
            self::STATUS_ACTIVE => 'Ativo',
            self::STATUS_INACTIVE => 'Inativo',
            self::STATUS_CANCELLED => 'Cancelado',
        ];

        if ($onlyKeys) {
            return array_keys($map);
        }

        return $map;
    }

    public static function getLabel(int $status): string
    {
        return self::toArray(false)[$status];
    }
}
