<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

final class InvoicePosition
{
    public function __construct(
        #[Serializer\Type("int")]
        #[Serializer\SerializedName("BillbeeId")]
        public int $id,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("Position")]
        public int $position,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("Amount")]
        public float $amount = 0.00,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("NetValue")]
        public float $netValue = 0.00,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("TotalNetValue")]
        public float $totalNetValue = 0.00,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("GrossValue")]
        public float $grossValue = 0.00,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("TotalGrossValue")]
        public float $totalGrossValue = 0.00,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("VatRate")]
        public ?float $vatRate = 0.00,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("ArticleBillbeeId")]
        public ?int $articleId = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Sku")]
        public ?string $sku = '',

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Title")]
        public ?string $title = '',

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("TotalVatAmount")]
        public float $totalVatAmount = 0,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("RebatePercent")]
        public ?float $rebatePercent = null,
    ) {
    }
}
