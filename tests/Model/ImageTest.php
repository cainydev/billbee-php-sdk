<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\Image;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class ImageTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/image.json';
    }

    public static function getExpectedObject(): Image
    {
        return new Image(
            id: 493289770,
            url: "https://cdn.stocksnap.io/img-thumbs/960w/fruit-slices_NNIRPAXZFX.jpg",
            thumbPathExt: "ab665923-d288-45ff-8d9e-410d10dda01e/40986800/100/493289770.png",
            thumbUrl: "https://cdn.stocksnap.io/img-thumbs/960w/fruit-slices_NNIRPAXZFX.jpg",
            position: 3,
            isDefault: true,
            articleId: 40986800,
        );
    }
}
