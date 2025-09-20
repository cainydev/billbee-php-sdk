<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\OrderItemAttribute;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class OrderItemAttributeTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/order_item_attribute.json';
    }

    public static function getExpectedObject(): OrderItemAttribute
    {
        return new OrderItemAttribute(
            id: "100000167774144",
            name: "x",
            value: "y",
            price: 0.00,
        );
    }
}
