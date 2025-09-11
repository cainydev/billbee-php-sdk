<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Response\GetLayoutsResponse;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;
use BillbeeDe\Tests\BillbeeAPI\Model\LayoutTest;

class GetLayoutsResponseTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Response/get_layouts_response.json';
    }

    public static function getExpectedObject(): GetLayoutsResponse
    {
        return new GetLayoutsResponse(
            data: [LayoutTest::getExpectedObject()]
        );
    }
}
