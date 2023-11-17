<?php

namespace App\Enums;

use App\Traits\EnumExtraFeature as values;

enum TaskStatus: int {
    case TODO = 0;
    case DONE = 1;

    use values;
}
