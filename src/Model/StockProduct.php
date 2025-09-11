<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

final class StockProduct
{
    public function __construct(
        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Name")]
        public ?string $name,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("StockId")]
        public int $stockId,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("StockCurrent")]
        public ?float $stockCurrent,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("StockWarning")]
        public ?float $stockWarning,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("StockCode")]
        public ?string $stockCode,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("UnfulfilledAmount")]
        public ?float $unfulfilledAmount,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("StockDesired")]
        public ?float $stockDesired,
    ) {
    }
}
