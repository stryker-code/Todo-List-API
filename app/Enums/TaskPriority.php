<?php

namespace App\Enums;

use App\Traits\EnumExtraFeature as values;

enum TaskPriority: int {
    case LOW = 1;
    case NORMAL = 2;
    case MEDIUM = 3;
    case HIGH = 4;
    case URGENT = 5;

    use values;
}
