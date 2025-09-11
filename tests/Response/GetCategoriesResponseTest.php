<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Response\GetCategoriesResponse;
use BillbeeDe\BillbeeAPI\Model\Category;
use BillbeeDe\Tests\BillbeeAPI\Model\CategoryTest;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class GetCategoriesResponseTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Response/get_categories_response.json';
    }

    public static function getExpectedObject(): GetCategoriesResponse
    {
        return new GetCategoriesResponse(data: [CategoryTest::getExpectedObject()]);
    }
}
