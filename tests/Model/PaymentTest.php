<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\Payment;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class PaymentTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/payment.json';
    }

    public static function getExpectedObject(): Payment
    {
        return new Payment(
            id: 100000045032352,
            transactionId: "txid",
            payDate: new \DateTime("2022-08-17T00:00:00"),
            paymentMethod: 1,
            sourceTechnology: "foo",
            sourceText: "konto",
            payValue: 162.0,
            purpose: "bestellung",
            name: "max muster"
        );
    }
}
