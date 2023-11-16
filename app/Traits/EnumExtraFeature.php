<?php

namespace App\Traits;

trait EnumExtraFeature
{
    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }
}
