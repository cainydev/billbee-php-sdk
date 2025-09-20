<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Model\PagingInformation;
use BillbeeDe\BillbeeAPI\Response\AcknowledgeResponse;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class AcknowledgeResponseTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Response/acknowledge_response.json';
    }

    public static function getExpectedObject(): AcknowledgeResponse
    {
        return new AcknowledgeResponse(
            errorMessage: 'ErrorMessage',
            errorCode: 1,
            data: [],
        );
    }
}
