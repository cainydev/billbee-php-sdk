<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Type;

enum VatMode: int
{
    case DEFAULT = 0;
    case SMALL_BUSINESS = 1;
    case INTRA_COMMUNITY_DELIVERY = 2;
    case EXPORT_3RD_COUNTRY = 3;
    case DIFFERENTIAL_TAXATION = 4;
}
