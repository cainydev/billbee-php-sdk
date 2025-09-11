<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

final class Dimensions
{
    public function __construct(
        #[Serializer\Type("float")]
        #[Serializer\SerializedName("width")]
        public float $width = 0.0,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("height")]
        public float $height = 0.0,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("length")]
        public float $length = 0.0,
    ) {
    }
}
