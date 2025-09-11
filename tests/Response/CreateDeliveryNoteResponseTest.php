<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Response\CreateDeliveryNoteResponse;
use BillbeeDe\BillbeeAPI\Model\DeliveryNoteDocument;
use BillbeeDe\Tests\BillbeeAPI\Model\DeliveryNoteDocumentTest;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class CreateDeliveryNoteResponseTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Response/create_delivery_note_response.json';
    }

    public static function getExpectedObject(): CreateDeliveryNoteResponse
    {
        return new CreateDeliveryNoteResponse(data: DeliveryNoteDocumentTest::getExpectedObject());
    }
}
