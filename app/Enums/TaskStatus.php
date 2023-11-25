<?php

namespace App\Enums;

use App\Traits\EnumExtraFeature as Values;

enum TaskStatus: int {
    case TODO = 0;
    case DONE = 1;

    use Values;
}
