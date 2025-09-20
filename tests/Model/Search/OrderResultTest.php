<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model\Search;

use BillbeeDe\BillbeeAPI\Model\Search\OrderResult;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class OrderResultTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/Search/order_result.json';
    }

    public static function getExpectedObject(): OrderResult
    {
        return new OrderResult(
            id: 122989702,
            externalReference: 'test',
            buyerName: 'Max Mustermann',
            invoiceNumber: 'IN1234',
            customerName: 'Max Mustermann2',
            articleTexts: '4711',
        );
    }
}
