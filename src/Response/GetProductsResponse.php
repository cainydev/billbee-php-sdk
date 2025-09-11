<?php

namespace BillbeeDe\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Model\Product;
use BillbeeDe\BillbeeAPI\Model\PagingInformation;
use JMS\Serializer\Annotation;

class GetProductsResponse
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

        /** @var array<Product> */
        #[Annotation\Type("array<BillbeeDe\BillbeeAPI\Model\Product>")]
        #[Annotation\SerializedName("Data")]
        public array $data = [],
    ) {
    }
}
