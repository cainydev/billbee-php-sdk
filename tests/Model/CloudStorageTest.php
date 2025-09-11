<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\CloudStorage;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class CloudStorageTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/cloud_storage.json';
    }

    public static function getExpectedObject(): CloudStorage
    {
        return new CloudStorage(
            id: 1,
            name: "GDrive",
            type: "GoogleDriveStorage",
            usedAsPrinter: true
        );
    }
}
