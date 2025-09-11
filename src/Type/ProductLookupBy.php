<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Type;

enum ProductLookupBy: string
{
    case ID = 'id';
    case EAN = 'ean';
    case SKU = 'sku';
}
