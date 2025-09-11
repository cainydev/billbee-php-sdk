<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\ShippingProduct;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class ShippingProductTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/shipping_product.json';
    }

    public static function getExpectedObject(): ShippingProduct
    {
        return new ShippingProduct(
            id: 100000000288647,
            displayName: "Test",
            productName: "V01PAK;01"
        );
    }
}
