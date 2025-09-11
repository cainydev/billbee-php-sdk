<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Response\GetTermsInfoResponse;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;
use BillbeeDe\Tests\BillbeeAPI\Model\TermsInfoTest;

class GetTermsInfoResponseTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Response/get_terms_info_response.json';
    }

    public static function getExpectedObject(): GetTermsInfoResponse
    {
        return new GetTermsInfoResponse(
            data: TermsInfoTest::getExpectedObject()
        );
    }
}
