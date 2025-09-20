<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\OrderHistoryEntry;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;
use DateTime;

class OrderHistoryEntryTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/order_history_entry.json';
    }

    public static function getExpectedObject(): OrderHistoryEntry
    {
        return new OrderHistoryEntry(
            created: new DateTime("2022-07-22T09:54:00+00:00"),
            eventTypeName: "Auftrag eingelesen",
            text: "Der Auftrag wurde eingelesen",
            employeeName: "max",
            typeId: 0,
        );
    }
}
