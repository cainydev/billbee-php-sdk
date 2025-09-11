<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Type\InvoiceType;
use BillbeeDe\BillbeeAPI\Type\VatMode;
use DateTimeInterface;
use JMS\Serializer\Annotation as Serializer;

final class Invoice
{
    public function __construct(
        #[Serializer\Type("int")]
        #[Serializer\SerializedName("BillbeeId")]
        public int $id,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("InvoiceNumber")]
        public ?string $invoiceNumber = null,

        #[Serializer\Type("enum<BillbeeDe\BillbeeAPI\Type\InvoiceType>")]
        #[Serializer\SerializedName("Type")]
        public ?InvoiceType $type = InvoiceType::INVOICE,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("LastName")]
        public ?string $lastName = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("FirstName")]
        public ?string $firstName = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Company")]
        public ?string $company = null,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("CustomerNumber")]
        public ?int $customerNumber = null,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("DebtorNumber")]
        public ?int $debtorNumber = null,

        #[Serializer\Type("DateTimeInterface<'Y-m-d\TH:i:s.v', 'UTC'>")]
        #[Serializer\SerializedName("InvoiceDate")]
        public ?DateTimeInterface $invoiceDate = null,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("TotalNet")]
        public ?float $totalNet = 0.00,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("TotalGross")]
        public ?float $totalGross = 0.00,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Currency")]
        public ?string $currency = 'EUR',

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("PaymentTypeId")]
        public ?int $paymentTypeId = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("OrderNumber")]
        public ?string $orderNumber = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("TransactionId")]
        public ?string $transactionId = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Email")]
        public ?string $email = '',

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("ShopName")]
        public ?string $shopName = null,

        /** @var ?InvoicePosition[] $positions */
        #[Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\InvoicePosition>")]
        #[Serializer\SerializedName("Positions")]
        public ?array $positions = [],

        #[Serializer\Type("DateTimeInterface<'Y-m-d\TH:i:s.v', 'UTC'>")]
        #[Serializer\SerializedName("PayDate")]
        public ?DateTimeInterface $payDate = null,

        #[Serializer\Type("enum<BillbeeDe\BillbeeAPI\Type\VatMode>")]
        #[Serializer\SerializedName("VatMode")]
        public VatMode $vatMode = VatMode::DEFAULT,

        #[Serializer\Type("BillbeeDe\BillbeeAPI\Model\VatFlags")]
        #[Serializer\SerializedName("VatFlags")]
        public ?VatFlags $vatFlags = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("ShippingCountry")]
        public ?string $shippingCountry = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Title")]
        public ?string $title = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Salutation")]
        public ?string $salutation = null,

        #[Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\InvoiceAdditionalFee>")]
        #[Serializer\SerializedName("AdditionalFees")]
        public ?array $additionalFees = [],

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("MerchantVatId")]
        public ?string $merchantVatId = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("CustomerVatId")]
        public ?string $customerVatId = null,
    ) {
    }
}
