<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\CustomerAddress;
use BillbeeDe\BillbeeAPI\Type\AddressType;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class CustomerAddressTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/customer_address.json';
    }

    public static function getExpectedObject(): CustomerAddress
    {
        return new CustomerAddress(
            id: 100000176934711,
            addressType: AddressType::INVOICE,
            customerId: 100000150176895,
            company: "firma",
            firstName: "Vorname",
            lastName: "Nachname",
            name2: "Name 2",
            street: "Straße",
            houseNumber: "Hausnummer",
            zip: "PLZ",
            city: "Ort",
            state: "Bundesland",
            countryCode: "DE",
            email: "max@mustermann.tld",
            phone1: "12345",
            phone2: "47896",
            fax: "010234",
            addressAddition: "Zusatz"
        );
    }
}
