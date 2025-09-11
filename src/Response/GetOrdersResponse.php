<?php

namespace BillbeeDe\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Model\Order;
use BillbeeDe\BillbeeAPI\Model\PagingInformation;
use JMS\Serializer\Annotation;

class GetOrdersResponse
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

        /** @var array<Order> */
        #[Annotation\Type("array<BillbeeDe\BillbeeAPI\Model\Order>")]
        #[Annotation\SerializedName("Data")]
        public array $data = [],
    ) {
    }
}
