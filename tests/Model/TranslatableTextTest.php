<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\TranslatableText;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class TranslatableTextTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/translatable_text.json';
    }

    public static function getExpectedObject(): TranslatableText
    {
        return new TranslatableText(
            text: "Test",
            languageCode: "DE"
        );
    }
}
