<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use DateTimeInterface;
use JMS\Serializer\Annotation as Serializer;

final class InvoiceDocument
{
    public function __construct(
        #[Serializer\Type("string")]
        #[Serializer\SerializedName("OrderNumber")]
        public ?string $orderNumber,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("InvoiceNumber")]
        public ?string $invoiceNumber = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("PDFData")]
        public ?string $pdfData = null,

        #[Serializer\Type("DateTimeInterface<'Y-m-d\TH:i:s.v'>")]
        #[Serializer\SerializedName("InvoiceDate")]
        public ?DateTimeInterface $invoiceDate = null,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("TotalGross")]
        public float $totalGross = 0.00,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("TotalNet")]
        public float $totalNet = 0.00,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("PdfDownloadUrl")]
        public ?string $pdfDownloadUrl = null,
    ) {
    }
}
