<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\BillOfMaterialProduct;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class BillOfMaterialProductTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/bill_of_material_product.json';
    }

    public static function getExpectedObject(): BillOfMaterialProduct
    {
        return new BillOfMaterialProduct(
            articleId: 1234,
            amount: 1.0,
            sku: "PROD1234",
        );
    }
}
