<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Represents a bill of material product in the Billbee API
 */
final class BillOfMaterialProduct
{
    public function __construct(
        #[Serializer\Type("int")]
        #[Serializer\SerializedName("ArticleId")]
        public int $articleId,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("Amount")]
        public float $amount,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("SKU")]
        public ?string $sku = null,
    ) {
    }
}
