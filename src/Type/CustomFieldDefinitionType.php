<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Type;

enum CustomFieldDefinitionType: int
{
    case TEXT_FIELD = 0;
    case TEXT_AREA = 1;
    case NUMBER = 2;
    case DROP_DOWN = 3;
}
