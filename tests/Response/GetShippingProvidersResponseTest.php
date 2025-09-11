<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Response\GetShippingProvidersResponse;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;
use BillbeeDe\Tests\BillbeeAPI\Model\ShippingProviderTest;

class GetShippingProvidersResponseTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Response/get_shipping_providers_response.json';
    }

    public static function getExpectedObject(): GetShippingProvidersResponse
    {
        return new GetShippingProvidersResponse(
            data: [ShippingProviderTest::getExpectedObject()]
        );
    }
}
