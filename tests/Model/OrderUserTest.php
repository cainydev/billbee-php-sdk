<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\OrderUser;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class OrderUserTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/seller.json';
    }

    public static function getExpectedObject(): OrderUser
    {
        return new OrderUser(
            platform: "avocadostore",
            shopName: "test",
            shopId: 100000000092372,
            id: "1234",
            nick: "nick name",
            firstName: "vorname",
            lastName: "nachname",
            fullName: "vorname nachname",
            email: "max@muster.tld"
        );
    }
}
