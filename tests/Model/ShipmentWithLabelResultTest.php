<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\ShipmentWithLabelResult;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class ShipmentWithLabelResultTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/shipment_with_label_result.json';
    }

    public static function getExpectedObject(): ShipmentWithLabelResult
    {
        return new ShipmentWithLabelResult(
            orderId: 1234,
            orderReference: "ref",
            shippingId: "shipping id",
            trackingUrl: "tracking url",
            labelDataPdf: "data",
            exportDocsPdf: "export docs pdf",
            carrier: "carrier",
            shippingDate: "2022-08-10T00:00:00",
        );
    }
}
