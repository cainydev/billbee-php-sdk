<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\Shipment;
use BillbeeDe\BillbeeAPI\Type\ShipmentType;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class ShipmentTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/shipment.json';
    }

    public static function getExpectedObject(): Shipment
    {
        return new Shipment(
            shippingId: "ShippingId",
            orderId: "OrderId",
            comment: "OrderCommentId",
            shippingProviderId: 1,
            shippingProductId: 2,
            carrierId: 3,
            type: ShipmentType::RETURN
        );
    }
}
