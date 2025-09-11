<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Type;

enum OrderState: int
{
    case ORDERED = 1;
    case CONFIRMED = 2;
    case PAID = 3;
    case SHIPPED = 4;
    case RECLAMATION = 5;
    case DELETED = 6;
    case CLOSED = 7;
    case CANCELED = 8;
    case ARCHIVED = 9;
    // CONST NOT_USED = 10;
    case DEMAND_NOTE = 11;
    case DEMAND_NOTE2 = 12;
    case PACKED = 13;
    case OFFERED = 14;
    case REMINDER = 15;
}
