<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\MessageForCustomer;
use BillbeeDe\BillbeeAPI\Model\TranslatableText;
use BillbeeDe\BillbeeAPI\Type\SendMode;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class MessageForCustomerTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/message_for_customer.json';
    }

    public static function getExpectedObject(): MessageForCustomer
    {
        return new MessageForCustomer(
            sendMode: SendMode::EMAIL,
            subject: [new TranslatableText(text: "Hallo", languageCode: "DE")],
            body: [new TranslatableText(text: "Welt", languageCode: "DE")],
            alternativeEmailAddress: "foo@bar.tld",
        );
    }
}
