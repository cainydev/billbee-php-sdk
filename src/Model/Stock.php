<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

final class Stock
{
    public function __construct(
        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Sku")]
        public ?string $sku,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("StockId")]
        public ?int $stockId = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Reason")]
        public ?string $reason = null,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("OldQuantity")]
        public ?float $oldQuantity = 0,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("NewQuantity")]
        public ?float $newQuantity = 0,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("DeltaQuantity")]
        public float $deltaQuantity = 0,

        #[Serializer\Type("bool")]
        #[Serializer\SerializedName("AutosubtractReservedAmount")]
        public bool $autosubtractReservedAmount = false,
    ) {
    }

    public static function fromProduct(Product $product): Stock
    {
        return new Stock(
            sku: $product->getSku(),
            oldQuantity: $product->getStockCurrent(),
        );
    }
}
