<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\Customer;
use BillbeeDe\BillbeeAPI\Model\CustomerMetaData;
use BillbeeDe\BillbeeAPI\Type\CustomerMetaDataType;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class CustomerTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/customer.json';
    }

    public static function getExpectedObject(): Customer
    {
        $defaultMailAddress = new CustomerMetaData(
            id: 208297764,
            type: CustomerMetaDataType::MAIL,
            typeName: 'EMail',
            subType: '',
            value: 'max@mustermann.tld'
        );
        $defaultPhone1 = new CustomerMetaData(
            id: 208297765,
            type: CustomerMetaDataType::PHONE,
            typeName: 'Phone',
            subType: '',
            value: '12345'
        );

        return new Customer(
            id: 100000150176895,
            name: "Max",
            email: "max@mustermann.tld",
            tel1: "12345",
            tel2: "12345",
            number: 1,
            priceGroupId: 1818,
            languageId: 3,
            vatId: '1234',
            type: 0,
            defaultMailAddress: $defaultMailAddress,
            defaultCommercialMailAddress: $defaultMailAddress,
            defaultStatusUpdatesMailAddress: $defaultMailAddress,
            defaultPhone1: $defaultPhone1,
            defaultPhone2: $defaultPhone1,
            defaultFax: $defaultPhone1,
            metaData: [$defaultMailAddress, $defaultPhone1]
        );
    }
}
