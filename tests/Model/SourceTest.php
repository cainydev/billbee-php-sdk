<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\Source;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class SourceTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/source.json';
    }

    public static function getExpectedObject(): Source
    {
        return new Source(
            id: 36174052,
            source: "manual",
            sourceId: "test",
            apiAccountName: "test",
            apiAccountId: 70815,
            exportFactor: 1.0,
            stockSyncInactive: false,
            stockSyncMin: 2.0,
            stockSyncMax: 3.0,
            unitsPerItem: 1.0,
            custom: null
        );
    }
}
