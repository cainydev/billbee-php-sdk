<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\CreateCustomerRequest;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class CreateCustomerRequestTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/create_customer_request.json';
    }

    public static function getExpectedObject(): CreateCustomerRequest
    {
        return new CreateCustomerRequest(
            address: CustomerAddressTest::getExpectedObject(),
        );
    }
}
