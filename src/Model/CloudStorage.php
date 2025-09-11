<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Represents a cloud storage in the Billbee API
 */
final class CloudStorage
{
    public function __construct(
        #[Serializer\Type("int")]
        #[Serializer\SerializedName("Id")]
        public int $id,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Name")]
        public ?string $name = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Type")]
        public ?string $type = null,

        #[Serializer\Type("bool")]
        #[Serializer\SerializedName("UsedAsPrinter")]
        public bool $usedAsPrinter = false,
    ) {
    }
}
