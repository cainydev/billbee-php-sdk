<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\DeliveryNoteDocument;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;
use DateTime;
use DateTimeZone;

class DeliveryNoteDocumentTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/delivery_note_document.json';
    }

    public static function getExpectedObject(): DeliveryNoteDocument
    {
        return new DeliveryNoteDocument(
            orderNumber: "Test",
            deliveryNoteNumber: "20",
            pdfData: "base64-encrypted-pdf",
            deliveryNoteDate: new DateTime("2022-08-16T14:47:00"),
            pdfDownloadUrl: "https://objectstore.billbee.io",
        );
    }
}
