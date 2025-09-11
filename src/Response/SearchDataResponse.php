<?php

namespace BillbeeDe\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Model\Search;
use BillbeeDe\BillbeeAPI\Model\PagingInformation;
use JMS\Serializer\Annotation;

class SearchDataResponse
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

        /** @var array<Search\ProductResult>|null */
        #[Annotation\Type("array<BillbeeDe\BillbeeAPI\Model\Search\ProductResult>")]
        #[Annotation\SerializedName("Products")]
        public ?array $products = null,

        /** @var array<Search\OrderResult>|null */
        #[Annotation\Type("array<BillbeeDe\BillbeeAPI\Model\Search\OrderResult>")]
        #[Annotation\SerializedName("Orders")]
        public ?array $orders = null,

        /** @var array<Search\CustomerResult>|null */
        #[Annotation\Type("array<BillbeeDe\BillbeeAPI\Model\Search\CustomerResult>")]
        #[Annotation\SerializedName("Customers")]
        public ?array $customers = null,
    ) {
    }
}
