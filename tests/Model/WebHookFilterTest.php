<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\WebHookFilter;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class WebHookFilterTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/webhook_filter.json';
    }

    public static function getExpectedObject(): WebHookFilter
    {
        return new WebHookFilter(
            name: "Filter",
            description: "A filter"
        );
    }
}
