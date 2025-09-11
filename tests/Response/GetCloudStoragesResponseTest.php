<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Response\GetCloudStoragesResponse;
use BillbeeDe\BillbeeAPI\Model\CloudStorage;
use BillbeeDe\Tests\BillbeeAPI\Model\CloudStorageTest;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class GetCloudStoragesResponseTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Response/get_cloud_storages_response.json';
    }

    public static function getExpectedObject(): GetCloudStoragesResponse
    {
        return new GetCloudStoragesResponse(data: [CloudStorageTest::getExpectedObject()]);
    }
}
