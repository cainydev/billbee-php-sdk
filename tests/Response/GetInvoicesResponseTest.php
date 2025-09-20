<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Response\GetInvoicesResponse;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;
use BillbeeDe\Tests\BillbeeAPI\Model\InvoiceTest;

class GetInvoicesResponseTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Response/get_invoices_response.json';
    }

    public static function getExpectedObject(): GetInvoicesResponse
    {
        return new GetInvoicesResponse(
            data: [InvoiceTest::getExpectedObject()],
        );
    }
}
