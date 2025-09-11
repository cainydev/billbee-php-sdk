<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Represents a category in the Billbee API
 */
final class Category
{
    public function __construct(
        #[Serializer\Type("int")]
        #[Serializer\SerializedName("Id")]
        public ?int $id = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Name")]
        public ?string $name = '',
    ) {
    }
}
