<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model\Search;

use JMS\Serializer\Annotation as Serializer;

final readonly class OrderResult
{
    public function __construct(
        #[Serializer\Type("int")]
        #[Serializer\SerializedName("Id")]
        public int $id,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("ExternalReference")]
        public string $externalReference = '',

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("BuyerName")]
        public string $buyerName = '',

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("InvoiceNumber")]
        public string $invoiceNumber = '',

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("CustomerName")]
        public string $customerName = '',

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("ArticleTexts")]
        public string $articleTexts = '',
    ) {
    }
}
