<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\TermsInfo;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class TermsInfoTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/terms_info.json';
    }

    public static function getExpectedObject(): TermsInfo
    {
        return new TermsInfo(
            termsWebPageLink: "LinkToTermsWebPage",
            privacyWebPageLink: "LinkToPrivacyWebPage",
            termsContentLink: "LinkToTermsHtmlContent",
            privacyContentLink: "LinkToPrivacyHtmlContent",
        );
    }
}
