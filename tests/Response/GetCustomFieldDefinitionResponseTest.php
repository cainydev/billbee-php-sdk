<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Response\GetCustomFieldDefinitionResponse;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;
use BillbeeDe\Tests\BillbeeAPI\Model\CustomFieldDefinitionTest;

class GetCustomFieldDefinitionResponseTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Response/get_custom_field_definition_response.json';
    }

    public static function getExpectedObject(): GetCustomFieldDefinitionResponse
    {
        return new GetCustomFieldDefinitionResponse(
            data: CustomFieldDefinitionTest::getExpectedObject(),
        );
    }
}
