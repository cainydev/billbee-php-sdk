<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\ShipmentWithLabel;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class ShipmentWithLabelTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/shipment_with_label.json';
    }

    public static function getExpectedObject(): ShipmentWithLabel
    {
        return new ShipmentWithLabel(
            orderId: 1234,
            providerId: 1,
            productId: 2,
            changeStateToSend: true,
            printerName: "PrinterName",
            weightInGram: 100,
            shipDate: new \DateTime("2022-07-22T00:00:00+00:00"),
            clientReference: "ClientReference",
            dimension: DimensionsTest::getExpectedObject()
        );
    }
}
