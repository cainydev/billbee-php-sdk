<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\InvoiceDocument;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;
use DateTime;

class InvoiceDocumentTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/invoice_document.json';
    }

    public static function getExpectedObject(): InvoiceDocument
    {
        return new InvoiceDocument(
            orderNumber: "Test",
            invoiceNumber: "RN-2022-0083",
            pdfData: "base64-data",
            invoiceDate: new DateTime("2022-07-22T09:54:25.31"),
            totalGross: 170.76,
            totalNet: 143.5,
            pdfDownloadUrl: "https://objectstore.billbee.io",
        );
    }
}
