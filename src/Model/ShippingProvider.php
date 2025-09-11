<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

final class ShippingProvider
{
    public function __construct(
        #[Serializer\Type("int")]
        #[Serializer\SerializedName("id")]
        public int $id,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("name")]
        public ?string $name = null,

        /** @var ShippingProduct[] $products */
        #[Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\ShippingProduct>")]
        #[Serializer\SerializedName("products")]
        public array $products = [],
    ) {
    }
}
