<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Type\AddressType;
use JMS\Serializer\Annotation as Serializer;

/**
 * Represents a customer address in the Billbee API
 */
final class CustomerAddress
{
    public function __construct(
        #[Serializer\Type('int')]
        #[Serializer\SerializedName('Id')]
        public ?int $id = null,

        #[Serializer\Type('enum<BillbeeDe\BillbeeAPI\Type\AddressType>')]
        #[Serializer\SerializedName('AddressType')]
        public AddressType $addressType = AddressType::INVOICE,

        #[Serializer\Type('int')]
        #[Serializer\SerializedName('CustomerId')]
        public ?int $customerId = null,

        #[Serializer\Type('string')]
        #[Serializer\SerializedName('Company')]
        public ?string $company = null,

        #[Serializer\Type('string')]
        #[Serializer\SerializedName('FirstName')]
        public ?string $firstName = null,

        #[Serializer\Type('string')]
        #[Serializer\SerializedName('LastName')]
        public ?string $lastName = null,

        #[Serializer\Type('string')]
        #[Serializer\SerializedName('Name2')]
        public ?string $name2 = null,

        #[Serializer\Type('string')]
        #[Serializer\SerializedName('Street')]
        public ?string $street = null,

        #[Serializer\Type('string')]
        #[Serializer\SerializedName('Housenumber')]
        public ?string $houseNumber = null,

        #[Serializer\Type('string')]
        #[Serializer\SerializedName('Zip')]
        public ?string $zip = null,

        #[Serializer\Type('string')]
        #[Serializer\SerializedName('City')]
        public ?string $city = null,

        #[Serializer\Type('string')]
        #[Serializer\SerializedName('State')]
        public ?string $state = null,

        #[Serializer\Type('string')]
        #[Serializer\SerializedName('CountryCode')]
        public ?string $countryCode = null,

        #[Serializer\Type('string')]
        #[Serializer\SerializedName('Email')]
        public ?string $email = null,

        #[Serializer\Type('string')]
        #[Serializer\SerializedName('Tel1')]
        public ?string $phone1 = null,

        #[Serializer\Type('string')]
        #[Serializer\SerializedName('Tel2')]
        public ?string $phone2 = null,

        #[Serializer\Type('string')]
        #[Serializer\SerializedName('Fax')]
        public ?string $fax = null,

        #[Serializer\Type('string')]
        #[Serializer\SerializedName('FullAddr')]
        public ?string $fullAddress = null,

        #[Serializer\Type('string')]
        #[Serializer\SerializedName('AddressAddition')]
        public ?string $addressAddition = null,
    ) {
    }
}
