<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\Address;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class AddressTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/address.json';
    }

    public static function getExpectedObject(): Address
    {
        return new Address(
            id: 1,
            city: "ort",
            street: "Str",
            company: "Firma",
            zip: "12345",
            state: "staat",
            country: "DE",
            countryISO2: "DE",
            firstName: "Vorname",
            lastName: "Nachname",
            phone: "12345",
            email: "admin@domain.tld",
            houseNumber: "hausnummer",
            nameAddition: "Zusatz",
        );
    }
}
