<?php

namespace BillbeeDe\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Model\PagingInformation;
use BillbeeDe\BillbeeAPI\Model\StockUpdateResult;
use JMS\Serializer\Annotation;

class UpdateStockResponse
{
    public function __construct(
        #[Annotation\Type("string")]
        #[Annotation\SerializedName("ErrorMessage")]
        public ?string $errorMessage = null,

        #[Annotation\Type("int")]
        #[Annotation\SerializedName("ErrorCode")]
        public int $errorCode = 0,

        #[Annotation\Type("BillbeeDe\BillbeeAPI\Model\StockUpdateResult")]
        #[Annotation\SerializedName("Data")]
        public ?StockUpdateResult $data = null,
    ) {
    }
}
