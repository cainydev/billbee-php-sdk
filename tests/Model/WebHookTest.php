<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\WebHook;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class WebHookTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/webhook.json';
    }

    public static function getExpectedObject(): WebHook
    {
        return new WebHook(
            id: "Id",
            webHookUri: "https://foo.bar",
            secret: "Secret",
            description: "a description",
            isPaused: true,
            filters: ["filter"],
            headers: ["a" => "b"],
            properties: ["c" => "d"],
        );
    }
}
