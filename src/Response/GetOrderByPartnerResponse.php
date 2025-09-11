<?php

namespace BillbeeDe\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Model\PartnerOrder;
use BillbeeDe\BillbeeAPI\Model\PagingInformation;
use JMS\Serializer\Annotation;

class GetOrderByPartnerResponse
{
    public function __construct(
        #[Annotation\Type("string")]
        #[Annotation\SerializedName("ErrorMessage")]
        public ?string $errorMessage = null,

        #[Annotation\Type("int")]
        #[Annotation\SerializedName("ErrorCode")]
        public int $errorCode = 0,

        #[Annotation\Type("BillbeeDe\BillbeeAPI\Model\PartnerOrder")]
        #[Annotation\SerializedName("Data")]
        public ?PartnerOrder $data = null,
    ) {
    }
}
