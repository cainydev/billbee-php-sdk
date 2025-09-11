<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Type;

enum AddressType: int
{
    case INVOICE = 1;
    case DELIVERY = 2;
}
