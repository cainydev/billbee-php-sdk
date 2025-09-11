<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Type\PaymentType;
use DateTimeInterface;
use JMS\Serializer\Annotation as Serializer;

final class Payment
{
    public function __construct(
        #[Serializer\Type("int")]
        #[Serializer\SerializedName("BillbeeId")]
        public int $id,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("TransactionId")]
        public ?string $transactionId = null,

        #[Serializer\Type("DateTimeInterface")]
        #[Serializer\SerializedName("PayDate")]
        public ?DateTimeInterface $payDate = null,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("PaymentType")]
        public ?int $paymentMethod = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("SourceTechnology")]
        public ?string $sourceTechnology = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("SourceText")]
        public ?string $sourceText = null,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("PayValue")]
        public ?float $payValue = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Purpose")]
        public ?string $purpose = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Name")]
        public ?string $name = null,
    ) {
    }
}
