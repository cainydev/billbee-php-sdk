<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation;

final class StockUpdateResult
{
    public function __construct(
        #[Annotation\Type("string")]
        #[Annotation\SerializedName("SKU")]
        public ?string $sku = null,

        #[Annotation\Type("float")]
        #[Annotation\SerializedName("OldStock")]
        public ?float $oldStock = null,

        #[Annotation\Type("float")]
        #[Annotation\SerializedName("CurrentStock")]
        public ?float $currentStock = null,

        #[Annotation\Type("float")]
        #[Annotation\SerializedName("UnfulfilledAmount")]
        public ?float $unfulfilledAmount = null,

        #[Annotation\Type("string")]
        #[Annotation\SerializedName("Message")]
        public string $message = '',
    ) {
    }
}
