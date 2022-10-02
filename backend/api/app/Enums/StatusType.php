<?php

namespace App\Enums;

enum StatusType: string
{
    case WAITING = "waiting";
    case COMPLETE = "complete";

    public static function label($value): string
    {
        return match ($value) {
            self::WAITING->value => '待機中',
            self::COMPLETE->value => '完了'
        };
    }

    public static function value(string $key): int
    {
        return match ($key) {
            '待機中' => self::WAITING->value,
            '完了' => self::COMPLETE->value
        };
    }
}
