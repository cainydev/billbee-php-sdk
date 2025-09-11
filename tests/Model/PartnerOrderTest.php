<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\PartnerOrder;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class PartnerOrderTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/partner_order.json';
    }

    public static function getExpectedObject(): PartnerOrder
    {
        return new PartnerOrder(
            id: 100000187723587,
            externalId: "#19405145",
            invoiceNumber: "12345",
            invoiceCreatedAt: new \DateTime("2022-08-17T02:00:00+00:00"),
            invoiceDate: new \DateTime("2022-08-17T02:00:00+00:00"),
            createdAt: new \DateTime("2022-08-17T02:00:00+00:00"),
            paidAt: new \DateTime("2022-08-17T02:00:00+00:00"),
            shippedAt: new \DateTime("2022-08-17T02:00:00+00:00"),
            hasInvoice: true,
            orderStateId: 1,
            orderStateText: "Bestellt",
            totalGross: 113.11,
            shopName: "Fake Shop 3",
            canCreateAutoInvoice: true
        );
    }
}
