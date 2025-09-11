<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Response\CreateInvoiceResponse;
use BillbeeDe\Tests\BillbeeAPI\Model\InvoiceDocumentTest;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class CreateInvoiceResponseTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Response/create_invoice_response.json';
    }

    public static function getExpectedObject(): CreateInvoiceResponse
    {
        return new CreateInvoiceResponse(data: InvoiceDocumentTest::getExpectedObject());
    }
}
