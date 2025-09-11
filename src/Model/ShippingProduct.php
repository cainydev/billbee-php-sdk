<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

final class ShippingProduct
{
    public function __construct(
        #[Serializer\Type("int")]
        #[Serializer\SerializedName("id")]
        public int $id,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("displayName")]
        public ?string $displayName = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("productName")]
        public ?string $productName = null,
    ) {
    }
}
