<?php

namespace App\Enums;

enum TaskStatusEnum: string
{
    case TODO = "to do";
    case INProgress = " in progress";
    case DONE = "done";

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}