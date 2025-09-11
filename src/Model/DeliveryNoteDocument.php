<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use DateTimeInterface;
use JMS\Serializer\Annotation as Serializer;

/**
 * Represents a delivery note document in the Billbee API
 */
final class DeliveryNoteDocument
{
    public function __construct(
        #[Serializer\Type("string")]
        #[Serializer\SerializedName("OrderNumber")]
        public ?string $orderNumber = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("DeliveryNoteNumber")]
        public ?string $deliveryNoteNumber = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("PDFData")]
        public ?string $pdfData = null,

        #[Serializer\Type("DateTimeInterface<'Y-m-d\\TH:i:s'>")]
        #[Serializer\SerializedName("DeliveryNoteDate")]
        public ?DateTimeInterface $deliveryNoteDate = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("PdfDownloadUrl")]
        public ?string $pdfDownloadUrl = null,
    ) {
    }
}
