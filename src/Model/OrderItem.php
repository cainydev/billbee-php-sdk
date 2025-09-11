<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

final class OrderItem
{
    public function __construct(
        #[Serializer\Type("int")]
        #[Serializer\SerializedName("BillbeeId")]
        public ?int $billbeeId = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("TransactionId")]
        public ?string $transactionId = null,

        #[Serializer\Type("BillbeeDe\BillbeeAPI\Model\SoldProduct")]
        #[Serializer\SerializedName("Product")]
        public ?SoldProduct $product = null,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("Quantity")]
        public ?float $quantity = null,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("TotalPrice")]
        public ?float $totalPrice = null,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("UnrebatedTotalPrice")]
        public ?float $unrebatedTotalPrice = null,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("TaxAmount")]
        public ?float $taxAmount = null,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("TaxIndex")]
        public ?int $taxIndex = null,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("Discount")]
        public ?float $discount = null,

        /** @var OrderItemAttribute[] $attributes */
        #[Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\OrderItemAttribute>")]
        #[Serializer\SerializedName("Attributes")]
        public ?array $attributes = [],

        #[Serializer\Type("bool")]
        #[Serializer\SerializedName("GetPriceFromArticleIfAny")]
        public ?bool $getPriceFromArticleIfAny = null,

        #[Serializer\Type("bool")]
        #[Serializer\SerializedName("IsCoupon")]
        public ?bool $isCoupon = null,

        #[Serializer\Type("bool")]
        #[Serializer\SerializedName("DontAdjustStock")]
        public ?bool $dontAdjustStock = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("SerialNumber")]
        public ?string $serialNumber = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("InvoiceSKU")]
        public ?string $invoiceSku = null,
    ) {
    }
}
