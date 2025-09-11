<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Type;

enum SearchMode: int
{
    case _AND = 0;
    case _OR = 1;
    case _EXPERT = 2;
    case _PHRASE_PFX = 3;
    case _SUGGEST = 4;
}
