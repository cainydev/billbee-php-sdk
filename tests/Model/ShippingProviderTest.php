<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\ShippingProvider;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class ShippingProviderTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/shipping_provider.json';
    }

    public static function getExpectedObject(): ShippingProvider
    {
        return new ShippingProvider(
            id: 100000000022240,
            name: "My provider",
            products: [ShippingProductTest::getExpectedObject()]
        );
    }
}
