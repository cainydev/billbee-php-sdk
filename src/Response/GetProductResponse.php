<?php

namespace BillbeeDe\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Model\Product;
use BillbeeDe\BillbeeAPI\Model\PagingInformation;
use JMS\Serializer\Annotation;

class GetProductResponse
{
    public function __construct(
        #[Annotation\Type("string")]
        #[Annotation\SerializedName("ErrorMessage")]
        public ?string $errorMessage = null,

        #[Annotation\Type("int")]
        #[Annotation\SerializedName("ErrorCode")]
        public int $errorCode = 0,

        #[Annotation\Type("BillbeeDe\BillbeeAPI\Model\Product")]
        #[Annotation\SerializedName("Data")]
        public ?Product $data = null,
    ) {
    }
}
