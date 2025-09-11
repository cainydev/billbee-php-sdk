<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Response\GetEventsResponse;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;
use BillbeeDe\Tests\BillbeeAPI\Model\EventTest;

class GetEventsResponseTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Response/get_events_response.json';
    }

    public static function getExpectedObject(): GetEventsResponse
    {
        return new GetEventsResponse(
            data: [EventTest::getExpectedObject()]
        );
    }
}
