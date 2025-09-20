<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model\Search;

use BillbeeDe\BillbeeAPI\Model\Search\CustomerResult;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class CustomerResultTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/Search/customer_result.json';
    }

    public static function getExpectedObject(): CustomerResult
    {
        return new CustomerResult(
            id: 1,
            name: 'Max',
            addresses: 'Test',
            number: '1234',
        );
    }
}
