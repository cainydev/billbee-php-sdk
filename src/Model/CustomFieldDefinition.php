<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Type\CustomFieldDefinitionType;
use JMS\Serializer\Annotation as Serializer;

/**
 * Represents a custom field definition in the Billbee API
 */
final class CustomFieldDefinition
{
    public function __construct(
        #[Serializer\Type("int")]
        #[Serializer\SerializedName("Id")]
        public ?int $id = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Name")]
        public ?string $name = null,

        /** @var array<string, mixed>|null */
        #[Serializer\Type("CustomField")]
        #[Serializer\SerializedName("Configuration")]
        public ?array $configuration = null,

        #[Serializer\Type("enum<BillbeeDe\BillbeeAPI\Type\CustomFieldDefinitionType>")]
        #[Serializer\SerializedName("Type")]
        public ?CustomFieldDefinitionType $type = null,

        #[Serializer\Type("bool")]
        #[Serializer\SerializedName("IsNullable")]
        public bool $isNullable = false,
    ) {
    }
}
