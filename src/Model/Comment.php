<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use DateTimeInterface;
use JMS\Serializer\Annotation as Serializer;

/**
 * Represents a comment in the Billbee API
 */
final class Comment
{
    public function __construct(
        #[Serializer\Type("int")]
        #[Serializer\SerializedName("Id")]
        public int $id,

        #[Serializer\Type("DateTimeInterface<'Y-m-d\\TH:i:s.v\\Z', 'UTC'>")]
        #[Serializer\SerializedName("Created")]
        public ?DateTimeInterface $created = null,

        #[Serializer\Type("bool")]
        #[Serializer\SerializedName("FromCustomer")]
        public bool $fromCustomer = false,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Text")]
        public ?string $text = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Name")]
        public ?string $name = null,
    ) {
    }
}
