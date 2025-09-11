<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use DateTimeInterface;
use JMS\Serializer\Annotation as Serializer;

final class ShipmentWithLabel
{
    public function __construct(
        #[Serializer\Type("int")]
        #[Serializer\SerializedName("OrderId")]
        public int $orderId,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("ProviderId")]
        public ?int $providerId = null,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("ProductId")]
        public ?int $productId = null,

        #[Serializer\Type("bool")]
        #[Serializer\SerializedName("ChangeStateToSend")]
        public ?bool $changeStateToSend = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("PrinterName")]
        public ?string $printerName = null,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("WeightInGram")]
        public ?int $weightInGram = null,

        #[Serializer\Type("DateTimeInterface")]
        #[Serializer\SerializedName("ShipDate")]
        public ?DateTimeInterface $shipDate = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("ClientReference")]
        public ?string $clientReference = null,

        #[Serializer\Type("BillbeeDe\BillbeeAPI\Model\Dimensions")]
        #[Serializer\SerializedName("Dimension")]
        public ?Dimensions $dimension = null,
    ) {
    }
}
