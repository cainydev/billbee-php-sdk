<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Type\CustomerMetaDataType;
use JMS\Serializer\Annotation as Serializer;

/**
 * Represents customer metadata in the Billbee API
 */
final class CustomerMetaData
{
    public function __construct(
        #[Serializer\Type("int")]
        #[Serializer\SerializedName("Id")]
        public int $id = 0,

        #[Serializer\Type("enum<BillbeeDe\BillbeeAPI\Type\CustomerMetaDataType>")]
        #[Serializer\SerializedName("TypeId")]
        public CustomerMetaDataType $type = CustomerMetaDataType::MAIL,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("TypeName")]
        public ?string $typeName = '',

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("SubType")]
        public ?string $subType = '',

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Value")]
        public ?string $value = '',
    ) {
    }
}
