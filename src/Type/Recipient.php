<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Type;

enum Recipient: int
{
    case BABIES = 1;
    case BABY_BOYS = 2;
    case BABY_GIRLS = 3;
    case WOMAN = 4;
    case PETS = 5;
    case DOGS = 6;
    case TEENAGERS = 7;
    case BOYS = 8;
    case CATS = 9;
    case CHILDREN = 10;
    case GIRLS = 11;
    case MEN = 12;
    case TEEN_BOYS = 13;
    case TEEN_GIRLS = 14;
    case UNISEX = 15;
    case BIRDS = 16;
}
