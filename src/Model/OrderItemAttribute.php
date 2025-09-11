<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

final class OrderItemAttribute
{
    public function __construct(
        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Id")]
        public string $id,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Name")]
        public string $name,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Value")]
        public string $value,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("Price")]
        public float $price,
    ) {
    }
}
