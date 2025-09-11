<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Type;

enum DeliveryTime: int
{
    case DAYS_1_2 = 1;
    case DAYS_3_5 = 2;
    case DAYS_6_9 = 3;
    case DAYS_10_14 = 4;
    case DAYS_15_21 = 5;
    case WEEKS_4 = 6;
    case WEEKS_5 = 7;
    case WEEKS_6 = 8;
    case WEEKS_7 = 9;
    case WEEKS_8 = 10;
    case WEEKS_9 = 11;
    case WEEKS_10 = 12;
}
