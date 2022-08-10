<?php

namespace App\Helpers;

final class Preference
{
    public const AUTO_ATTENDANT = 'auto_attendant';

    public const VOICEMAIL_ENABLED = 'voicemail_enabled';

    public static function toArray($onlyKeys = true)
    {
        $map = [
            self::AUTO_ATTENDANT => [
                'label' => 'Auto atendimento',
                'description' => 'Indica que o número possui atendimento automático',
                'default' => true,
            ],
            self::VOICEMAIL_ENABLED => [
                'label' => 'Correio de voz',
                'description' => 'Indica que o número possui serviço de correio de voz ativo',
                'default' => true,
            ],
        ];

        if ($onlyKeys) {
            return array_keys($map);
        }

        return $map;
    }
}
