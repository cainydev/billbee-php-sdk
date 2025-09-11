<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\SoldProduct;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class SoldProductTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/sold_product.json';
    }

    public static function getExpectedObject(): SoldProduct
    {
        return new SoldProduct(
            id: "1234",
            oldId: "4321",
            billbeeId: 100000058592683,
            title: "Test Bestandsabgleich",
            weight: 500,
            sku: "TESTBESTAND",
            skuOrId: "TESTBESTAND",
            isDigital: true,
            ean: "testejcz",
            taric: "1234",
            countryOfOrigin: "AX"
        );
    }
}
