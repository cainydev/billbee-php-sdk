<?php

namespace BillbeeDe\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Model\Invoice;
use BillbeeDe\BillbeeAPI\Model\PagingInformation;
use JMS\Serializer\Annotation;

class GetInvoicesResponse
{
    public function __construct(
        #[Annotation\Type("BillbeeDe\BillbeeAPI\Model\PagingInformation")]
        #[Annotation\SerializedName("Paging")]
        public ?PagingInformation $paging = null,

        #[Annotation\Type("string")]
        #[Annotation\SerializedName("ErrorMessage")]
        public ?string $errorMessage = null,

        #[Annotation\Type("int")]
        #[Annotation\SerializedName("ErrorCode")]
        public int $errorCode = 0,

        /** @var array<Invoice> */
        #[Annotation\Type("array<BillbeeDe\BillbeeAPI\Model\Invoice>")]
        #[Annotation\SerializedName("Data")]
        public array $data = [],
    ) {
    }
}
