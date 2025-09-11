<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Type;

enum ShipmentType: int
{
    case SHIPMENT = 0;
    case RETURN = 1;
}
