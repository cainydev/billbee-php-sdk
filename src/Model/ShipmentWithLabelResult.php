<?php

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation;

final class ShipmentWithLabelResult
{
    public function __construct(
        #[Annotation\Type("int")]
        #[Annotation\SerializedName("OrderId")]
        public int $orderId,

        #[Annotation\Type("string")]
        #[Annotation\SerializedName("OrderReference")]
        public ?string $orderReference = null,

        #[Annotation\Type("string")]
        #[Annotation\SerializedName("ShippingId")]
        public ?string $shippingId = null,

        #[Annotation\Type("string")]
        #[Annotation\SerializedName("TrackingUrl")]
        public ?string $trackingUrl = null,

        #[Annotation\Type("string")]
        #[Annotation\SerializedName("LabelDataPdf")]
        public ?string $labelDataPdf = null,

        #[Annotation\Type("string")]
        #[Annotation\SerializedName("ExportDocsPdf")]
        public ?string $exportDocsPdf = null,

        #[Annotation\Type("string")]
        #[Annotation\SerializedName("Carrier")]
        public ?string $carrier = null,

        #[Annotation\Type("string")]
        #[Annotation\SerializedName("ShippingDate")]
        public ?string $shippingDate = null,
    ) {
    }
}
