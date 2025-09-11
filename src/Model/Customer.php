<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Represents a customer in the Billbee API
 */
final class Customer
{
    public function __construct(
        #[Serializer\Type("int")]
        #[Serializer\SerializedName("Id")]
        public ?int $id = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Name")]
        public ?string $name = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Email")]
        public ?string $email = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Tel1")]
        public ?string $tel1 = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Tel2")]
        public ?string $tel2 = null,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("Number")]
        public ?int $number = null,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("PriceGroupId")]
        public ?int $priceGroupId = null,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("LanguageId")]
        public ?int $languageId = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("VatId")]
        public ?string $vatId = null,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("Type")]
        public ?int $type = null,

        #[Serializer\Type("BillbeeDe\BillbeeAPI\Model\CustomerMetaData")]
        #[Serializer\SerializedName("DefaultMailAddress")]
        public ?CustomerMetaData $defaultMailAddress = null,

        #[Serializer\Type("BillbeeDe\BillbeeAPI\Model\CustomerMetaData")]
        #[Serializer\SerializedName("DefaultCommercialMailAddress")]
        public ?CustomerMetaData $defaultCommercialMailAddress = null,

        #[Serializer\Type("BillbeeDe\BillbeeAPI\Model\CustomerMetaData")]
        #[Serializer\SerializedName("DefaultStatusUpdatesMailAddress")]
        public ?CustomerMetaData $defaultStatusUpdatesMailAddress = null,

        #[Serializer\Type("BillbeeDe\BillbeeAPI\Model\CustomerMetaData")]
        #[Serializer\SerializedName("DefaultPhone1")]
        public ?CustomerMetaData $defaultPhone1 = null,

        #[Serializer\Type("BillbeeDe\BillbeeAPI\Model\CustomerMetaData")]
        #[Serializer\SerializedName("DefaultPhone2")]
        public ?CustomerMetaData $defaultPhone2 = null,

        #[Serializer\Type("BillbeeDe\BillbeeAPI\Model\CustomerMetaData")]
        #[Serializer\SerializedName("DefaultFax")]
        public ?CustomerMetaData $defaultFax = null,

        /** @var CustomerMetaData[] */
        #[Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\CustomerMetaData>")]
        #[Serializer\SerializedName("MetaData")]
        public array $metaData = [],
    ) {
    }
}
