<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Type;

enum VatIndex: int
{
    case NORMAL = 1;
    case REDUCED = 2;
}
