<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

final class TermsInfo
{
    public function __construct(
        #[Serializer\Type("string")]
        #[Serializer\SerializedName("LinkToTermsWebPage")]
        public ?string $termsWebPageLink = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("LinkToPrivacyWebPage")]
        public ?string $privacyWebPageLink = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("LinkToTermsHtmlContent")]
        public ?string $termsContentLink = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("LinkToPrivacyHtmlContent")]
        public ?string $privacyContentLink = null,
    ) {
    }
}
