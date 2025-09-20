<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\Comment;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;
use DateTime;

class CommentTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/comment.json';
    }

    public static function getExpectedObject(): Comment
    {
        return new Comment(
            id: 1,
            created: new DateTime("2022-08-16T09:05:01.787Z"),
            fromCustomer: true,
            text: "test",
            name: "customer",
        );
    }
}
