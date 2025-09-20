<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\Layout;
use BillbeeDe\BillbeeAPI\Type\LayoutType;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class LayoutTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/layout.json';
    }

    public static function getExpectedObject(): Layout
    {
        return new Layout(
            id: 100000000132970,
            name: "Lieferschein",
            type: LayoutType::DELIVERY_NOTE,
        );
    }
}
