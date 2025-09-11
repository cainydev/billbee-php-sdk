<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Represents an address in the Billbee API
 */
final class Address
{
    public function __construct(
        #[Serializer\Type("int")]
        #[Serializer\SerializedName("BillbeeId")]
        public int $id,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("City")]
        public ?string $city = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Street")]
        public ?string $street = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Company")]
        public ?string $company = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Line2")]
        public ?string $line2 = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Line3")]
        public ?string $line3 = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Zip")]
        public ?string $zip = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("State")]
        public ?string $state = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Country")]
        public ?string $country = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("CountryISO2")]
        public ?string $countryISO2 = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("FirstName")]
        public ?string $firstName = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("LastName")]
        public ?string $lastName = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Phone")]
        public ?string $phone = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Email")]
        public ?string $email = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("HouseNumber")]
        public ?string $houseNumber = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("NameAddition")]
        public ?string $nameAddition = null,

        /** Not mapped by the API, for local use */
        public mixed $comment = null,
    ) {
    }
}
