<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Type;

enum Unit: int
{
    case PIECE = 1;
    case KG = 2;
    case METER = 3;
    case HUNDRED_GRAM = 4;
    case LITER = 5;
    case MILLILITER = 6;
    case SQUARE_METER = 7;
    case CUBIC_METER = 8;
    case YARD = 9;
    case FAT_QUARTER = 10;
    case OUNCE = 11;
    case LBS = 12;
    case FLUID_OUNCE = 13;
    case GALLON = 14;
    case PAIR = 15;
    case GRAM = 16;
}
