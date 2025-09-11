<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Response\ShipWithLabelResponse;
use BillbeeDe\Tests\BillbeeAPI\Model\ShipmentWithLabelResultTest;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class ShipWithLabelResponseTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Response/ship_with_label_response.json';
    }

    public static function getExpectedObject(): ShipWithLabelResponse
    {
        return new ShipWithLabelResponse(
            data: ShipmentWithLabelResultTest::getExpectedObject()
        );
    }
}
