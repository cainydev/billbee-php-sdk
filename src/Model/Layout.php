<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Type\LayoutType;
use JMS\Serializer\Annotation as Serializer;

final class Layout
{
    public function __construct(
        #[Serializer\Type("int")]
        #[Serializer\SerializedName("Id")]
        public int $id,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Name")]
        public ?string $name = '',

        #[Serializer\Type("enum<BillbeeDe\BillbeeAPI\Type\LayoutType>")]
        #[Serializer\SerializedName("Type")]
        public LayoutType $type = LayoutType::INVOICE,
    ) {
    }
}
