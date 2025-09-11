<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Type;

enum ProductType: int
{
    case PRODUCT = 1;
    case BUNDLE = 2;
}
