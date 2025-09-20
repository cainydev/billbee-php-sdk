<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\Dimensions;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class DimensionsTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/dimensions.json';
    }

    public static function getExpectedObject(): Dimensions
    {
        return new Dimensions(
            width: 200.2,
            height: 50.5,
            length: 240.3,
        );
    }
}
