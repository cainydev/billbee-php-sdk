<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\CustomFieldDefinition;
use BillbeeDe\BillbeeAPI\Type\CustomFieldDefinitionType;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class CustomFieldDefinitionTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/custom_field_definition.json';
    }

    public static function getExpectedObject(): CustomFieldDefinition
    {
        return new CustomFieldDefinition(
            id: 100000000002236,
            name: 'Multi Dropdown',
            configuration: [
                'Choices' => ['Test1', 'Test2', 'Test3'],
                'Multiple' => true,
            ],
            type: CustomFieldDefinitionType::DROP_DOWN,
            isNullable: true,
        );
    }
}
