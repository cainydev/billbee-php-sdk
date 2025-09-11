<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Type;

enum ShippingCarrier: int
{
    case OTHER = 0;
    case DHLEXPRESS = 1;
    case DHL = 2;
    case HERMES = 3;
    case DPD = 4;
    case UPS = 5;
    case GLS = 6;
    case DPAG = 7;
    case OEPOST = 8;
    case FEDEX = 9;
    case GENERALOVERNIGHT = 10;
    case TNT = 11;
    case LIEFERY = 12;
    case ILOXX = 13;
    case PARCEL_ONE = 14;
    case CARGO_INTERNATIONAL = 15;
    case PIN_MAIL = 16;
    case USPOSTALSERVICE = 17;
    case AMAZON_LOGISTICS = 18;
}
