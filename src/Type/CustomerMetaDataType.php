<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Type;

enum CustomerMetaDataType: int
{
    case MAIL = 1;
    case PHONE = 2;
}
