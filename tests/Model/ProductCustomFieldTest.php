<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\ProductCustomField;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class ProductCustomFieldTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/product_custom_field_multiple.json';
    }

    public static function getExpectedObject(): ProductCustomField
    {
        return new ProductCustomField(
            id: 100000000658609,
            definitionId: 100000000002236,
            definition: CustomFieldDefinitionTest::getExpectedObject(),
            articleId: 100000060427005,
            value: ["Test1", "Test3"],
        );
    }
}
