<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

final class StockCode
{
    public function __construct(
        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Sku")]
        public string $sku,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("StockId")]
        public int $stockId,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("StockCode")]
        public string $stockCode,
    ) {
    }
}
