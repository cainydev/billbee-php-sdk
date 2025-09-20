<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\InvoicePosition;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class InvoicePositionTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/invoice_position.json';
    }

    public static function getExpectedObject(): InvoicePosition
    {
        return new InvoicePosition(
            id: 100000317105650,
            position: 1,
            amount: 12,
            netValue: 11.1176,
            totalNetValue: 133.4118,
            grossValue: 13.23,
            totalGrossValue: 158.76,
            vatRate: 19,
            articleId: 58592683,
            sku: "TESTBESTAND",
            title: "Test Bestandsabgleich",
            totalVatAmount: 25.3482,
            rebatePercent: 2,
        );
    }
}
