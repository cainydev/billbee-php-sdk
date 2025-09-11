<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\Event;
use BillbeeDe\BillbeeAPI\Type\EventType;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class EventTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/event.json';
    }

    public static function getExpectedObject(): Event
    {
        return new Event(
            id: 100002922949129,
            created: new \DateTime("2022-07-16T09:56:01.903"),
            type: EventType::API_USAGE,
            typeText: "Nutzung der API",
            employeeId: "employee-id",
            employeeName: "max muster",
            orderId: 123
        );
    }
}
