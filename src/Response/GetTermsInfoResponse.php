<?php

namespace BillbeeDe\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Model\TermsInfo;
use BillbeeDe\BillbeeAPI\Model\PagingInformation;
use JMS\Serializer\Annotation;

class GetTermsInfoResponse
{
    public function __construct(
        #[Annotation\Type("string")]
        #[Annotation\SerializedName("ErrorMessage")]
        public ?string $errorMessage = null,

        #[Annotation\Type("int")]
        #[Annotation\SerializedName("ErrorCode")]
        public int $errorCode = 0,

        #[Annotation\Type("BillbeeDe\BillbeeAPI\Model\TermsInfo")]
        #[Annotation\SerializedName("Data")]
        public ?TermsInfo $data = null,
    ) {
    }
}
