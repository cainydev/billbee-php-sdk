<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Type\OrderState;
use DateTimeInterface;
use JMS\Serializer\Annotation as Serializer;

final class PartnerOrder
{
    public function __construct(
        #[Serializer\Type("int")]
        #[Serializer\SerializedName("Id")]
        public int $id,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("ExternalId")]
        public ?string $externalId,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("InvoiceNumber")]
        public ?string $invoiceNumber,

        #[Serializer\Type("DateTimeInterface")]
        #[Serializer\SerializedName("InvoiceCreatedAt")]
        public ?DateTimeInterface $invoiceCreatedAt,

        #[Serializer\Type("DateTimeInterface")]
        #[Serializer\SerializedName("InvoiceDate")]
        public ?DateTimeInterface $invoiceDate,

        #[Serializer\Type("DateTimeInterface")]
        #[Serializer\SerializedName("CreatedAt")]
        public DateTimeInterface $createdAt,

        #[Serializer\Type("DateTimeInterface")]
        #[Serializer\SerializedName("PaidAt")]
        public ?DateTimeInterface $paidAt,

        #[Serializer\Type("DateTimeInterface")]
        #[Serializer\SerializedName("ShippedAt")]
        public ?DateTimeInterface $shippedAt,

        #[Serializer\Type("bool")]
        #[Serializer\SerializedName("HasInvoice")]
        public bool $hasInvoice = false,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("OrderStateId")]
        public int $orderStateId,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("OrderStateText")]
        public ?string $orderStateText,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("TotalGross")]
        public float $totalGross,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("ShopName")]
        public ?string $shopName,

        #[Serializer\Type("bool")]
        #[Serializer\SerializedName("CanCreateAutoInvoice")]
        public bool $canCreateAutoInvoice = false,
    ) {
    }
}
