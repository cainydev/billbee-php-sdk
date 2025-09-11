<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

final class InvoiceAdditionalFee
{
    public function __construct(
        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Type")]
        public ?string $type = '',

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("Gross")]
        public float $gross = 0.0,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("Net")]
        public float $net = 0.0,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("VatAmount")]
        public float $vatAmount = 0.0,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("VatRate")]
        public float $vatRate = 0.0,
    ) {
    }
}
