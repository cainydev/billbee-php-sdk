<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Response\GetCustomFieldDefinitionsResponse;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;
use BillbeeDe\Tests\BillbeeAPI\Model\CustomFieldDefinitionTest;

class GetCustomFieldDefinitionsResponseTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Response/get_custom_field_definitions_response.json';
    }

    public static function getExpectedObject(): GetCustomFieldDefinitionsResponse
    {
        return new GetCustomFieldDefinitionsResponse(
            data: [CustomFieldDefinitionTest::getExpectedObject()]
        );
    }
}
