<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Type;

enum ProductCondition: int
{
    case BRAND_NEW = 1;
    case USED_LIKE_NEW = 2;
    case USED_VERY_GOOD = 3;
    case USED_GOOD = 4;
    case USED_IN_ORDER = 5;
    case USED_BAD = 6;
    case BROKEN = 7;
}
