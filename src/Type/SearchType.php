<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Type;

enum SearchType: string
{
    case PRODUCT = "product";
    case ORDER = "order";
    case CUSTOMER = "customer";
}
