<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\CustomerMetaData;
use BillbeeDe\BillbeeAPI\Type\CustomerMetaDataType;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class CustomerMetaDataTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/customer_meta_data.json';
    }

    public static function getExpectedObject(): CustomerMetaData
    {
        return new CustomerMetaData(
            id: 208297764,
            type: CustomerMetaDataType::MAIL,
            typeName: "EMail",
            subType: "",
            value: "max@mustermann.tld"
        );
    }
}
