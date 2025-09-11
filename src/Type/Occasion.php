<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Type;

enum Occasion: int
{
    case GRADUATION = 1;
    case SYMPATHY = 2;
    case BAR_OR_BAT_MITZVAH = 3;
    case CANADA_DAY = 4;
    case CHINESE_NEW_YEAR = 5;
    case CINCO_DE_MAYO = 6;
    case DAY_OF_THE_DEAD = 7;
    case JULY_4TH = 8;
    case EID = 9;
    case BIRTHDAY = 10;
    case GET_WELL = 11;
    case HALLOWEEN = 12;
    case HANUKKAH = 13;
    case HOUSEWARMING = 14;
    case WEDDING = 15;
    case ANNIVERSARY = 16;
    case CONFIRMATION = 17;
    case KWANZAA = 18;
    case MOTHERS_DAY = 19;
    case NEW_BABY = 20;
    case NEW_YEARS = 21;
    case EASTER = 22;
    case PROM = 23;
    case QUINCEANERA = 24;
    case RETIREMENT = 25;
    case ST_PATRICKS_DAY = 26;
    case SWEET_16 = 27;
    case BAPTISM = 28;
    case THANKSGIVING = 29;
    case VALENTINES = 30;
    case FATHERS_DAY = 31;
    case ENGAGEMENT = 32;
    case CHRISTMAS = 33;
}
