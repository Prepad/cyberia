<?php

namespace App\Enums;

enum OperationEnum: int
{
    case CREATED = 0;
    case UPDATED = 1;
    case DELETED = 2;
    case RESTORED = 3;
    case FORCE_DELETED = 4;
}
