<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Type;

enum LayoutType: int
{
    case INVOICE = 0;
    case LABEL = 1;
    case DELIVERY_NOTE = 2;
    case ORDER_COMMIT = 3;
    case OFFER = 4;
    case CANCELLATION_INVOICE = 5;
}
