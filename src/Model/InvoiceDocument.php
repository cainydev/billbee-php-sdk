<?php

/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - now by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\BillbeeAPI\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

class InvoiceDocument
{
    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("OrderNumber")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?string $orderNumber;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("InvoiceNumber")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?string $invoiceNumber;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("PDFData")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?string $pdfData;

    /**
     * @var ?DateTime
     * @Serializer\Type("DateTime<'Y-m-d\TH:i:s.v'>")
     * @Serializer\SerializedName("InvoiceDate")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?DateTime $invoiceDate;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("TotalGross")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public float $totalGross;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("TotalNet")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public float $totalNet;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("PdfDownloadUrl")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?string $pdfDownloadUrl;

    public function getOrderNumber(): ?string
    {
        return $this->orderNumber;
    }

    public function setOrderNumber(?string $orderNumber): self
    {
        $this->orderNumber = $orderNumber;
        return $this;
    }

    public function getInvoiceNumber(): ?string
    {
        return $this->invoiceNumber;
    }

    public function setInvoiceNumber(?string $invoiceNumber): self
    {
        $this->invoiceNumber = $invoiceNumber;
        return $this;
    }

    public function getPdfData(): ?string
    {
        return $this->pdfData;
    }

    public function setPdfData(?string $pdfData): self
    {
        $this->pdfData = $pdfData;
        return $this;
    }

    public function getInvoiceDate(): ?DateTime
    {
        return $this->invoiceDate;
    }

    public function setInvoiceDate(?DateTime $invoiceDate): self
    {
        $this->invoiceDate = $invoiceDate;
        return $this;
    }

    public function getTotalGross(): float
    {
        return $this->totalGross;
    }

    public function setTotalGross(float $totalGross): self
    {
        $this->totalGross = $totalGross;
        return $this;
    }

    public function getTotalNet(): float
    {
        return $this->totalNet;
    }

    public function setTotalNet(float $totalNet): self
    {
        $this->totalNet = $totalNet;
        return $this;
    }

    public function getPdfDownloadUrl(): ?string
    {
        return $this->pdfDownloadUrl;
    }

    public function setPdfDownloadUrl(?string $pdfDownloadUrl): self
    {
        $this->pdfDownloadUrl = $pdfDownloadUrl;
        return $this;
    }
}
