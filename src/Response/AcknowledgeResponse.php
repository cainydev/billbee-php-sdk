<?php

namespace BillbeeDe\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Model\PagingInformation;
use JMS\Serializer\Annotation;

/**
 * Represents a generic acknowledgement for empty API responses.
 */
class AcknowledgeResponse
{
    public function __construct(
        #[Annotation\Type("string")]
        #[Annotation\SerializedName("ErrorMessage")]
        public ?string $errorMessage = null,

        #[Annotation\Type("int")]
        #[Annotation\SerializedName("ErrorCode")]
        public int $errorCode = 0,

        /** @var array{} */
        #[Annotation\Type("array")]
        #[Annotation\SerializedName("Data")]
        public array $data = []
    ) {
    }
}
