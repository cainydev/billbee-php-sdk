<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model\Search;

use JMS\Serializer\Annotation as Serializer;

final readonly class CustomerResult
{
    public function __construct(
        #[Serializer\Type("int")]
        #[Serializer\SerializedName("Id")]
        public int $id = 0,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Name")]
        public string $name = '',

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Addresses")]
        public string $addresses = '',

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Number")]
        public string $number = '',
    ) {
    }
}
