<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\Category;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class CategoryTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/category.json';
    }

    public static function getExpectedObject(): Category
    {
        return new Category(
            id: 8733,
            name: "Schuhe",
        );
    }
}
