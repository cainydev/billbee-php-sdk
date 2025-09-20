<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Response\GetPatchableFieldsResponse;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class GetPatchableFieldsResponseTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Response/get_patchable_fields_response.json';
    }

    public static function getExpectedObject(): GetPatchableFieldsResponse
    {
        return new GetPatchableFieldsResponse(
            data: ["field1", "field2"],
        );
    }
}
