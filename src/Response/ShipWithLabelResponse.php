<?php

namespace BillbeeDe\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Model\ShipmentWithLabelResult;
use JMS\Serializer\Annotation;

class ShipWithLabelResponse
{
    public function __construct(
        #[Annotation\Type("string")]
        #[Annotation\SerializedName("ErrorMessage")]
        public ?string $errorMessage = null,

        #[Annotation\Type("int")]
        #[Annotation\SerializedName("ErrorCode")]
        public int $errorCode = 0,

        #[Annotation\Type("BillbeeDe\BillbeeAPI\Model\ShipmentWithLabelResult")]
        #[Annotation\SerializedName("Data")]
        public ?ShipmentWithLabelResult $data = null,
    ) {
    }
}
