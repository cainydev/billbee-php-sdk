<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Response\GetOrderByPartnerResponse;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;
use BillbeeDe\Tests\BillbeeAPI\Model\PartnerOrderTest;

class GetOrderByPartnerResponseTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Response/get_order_by_partner_response.json';
    }

    public static function getExpectedObject(): GetOrderByPartnerResponse
    {
        return new GetOrderByPartnerResponse(
            data: PartnerOrderTest::getExpectedObject()
        );
    }
}
