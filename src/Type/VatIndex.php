<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Type;

enum VatIndex: int
{
    case NONE = 0;
    case NORMAL = 1;
    case REDUCED = 2;
}
