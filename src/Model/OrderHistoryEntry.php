<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use DateTimeInterface;
use JMS\Serializer\Annotation as Serializer;

final class OrderHistoryEntry
{
    public function __construct(
        #[Serializer\Type("DateTimeInterface")]
        #[Serializer\SerializedName("Created")]
        public ?DateTimeInterface $created = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("EventTypeName")]
        public ?string $eventTypeName = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Text")]
        public ?string $text = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("EmployeeName")]
        public ?string $employeeName = null,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("TypeId")]
        public ?int $typeId = null,
    ) {
    }
}
