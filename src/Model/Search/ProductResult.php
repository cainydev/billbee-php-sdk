<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model\Search;

use JMS\Serializer\Annotation as Serializer;

final readonly class ProductResult
{
    public function __construct(
        #[Serializer\Type("int")]
        #[Serializer\SerializedName("Id")]
        public int $id,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("ShortText")]
        public string $shortText = '',

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("SKU")]
        public string $sku = '',

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Tags")]
        public string $tags = '',
    ) {
    }
}
