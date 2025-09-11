<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Type\EventType;
use DateTimeInterface;
use JMS\Serializer\Annotation as Serializer;

final class Event
{
    public function __construct(
        #[Serializer\Type("int")]
        #[Serializer\SerializedName("Id")]
        public int $id,

        #[Serializer\Type("DateTimeInterface<'Y-m-d\TH:i:s.v'>")]
        #[Serializer\SerializedName("Created")]
        public DateTimeInterface $created,

        #[Serializer\Type("enum<BillbeeDe\BillbeeAPI\Type\EventType>")]
        #[Serializer\SerializedName("TypeId")]
        public EventType $type = EventType::ACCOUNT_CREATED,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("TypeText")]
        public ?string $typeText = '',

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("EmployeeId")]
        public ?string $employeeId = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("EmployeeName")]
        public ?string $employeeName = '',

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("OrderId")]
        public ?int $orderId = null,
    ) {
    }
}
