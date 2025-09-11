<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Type\ShipmentType;
use JMS\Serializer\Annotation as Serializer;

final class Shipment
{
    public function __construct(
        #[Serializer\Type("string")]
        #[Serializer\SerializedName("ShippingId")]
        public ?string $shippingId = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("OrderId")]
        public ?string $orderId = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Comment")]
        public ?string $comment = null,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("ShippingProviderId")]
        public ?int $shippingProviderId = null,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("ShippingProviderProductId")]
        public ?int $shippingProductId = null,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("CarrierId")]
        public ?int $carrierId = null,

        #[Serializer\Type("enum<BillbeeDe\BillbeeAPI\Type\ShipmentType>")]
        #[Serializer\SerializedName("ShipmentType")]
        public ?ShipmentType $type = ShipmentType::SHIPMENT,
    ) {
    }
}
