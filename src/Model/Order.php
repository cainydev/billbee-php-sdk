<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Type\OrderState;
use BillbeeDe\BillbeeAPI\Type\VatMode;
use DateTimeInterface;
use JMS\Serializer\Annotation as Serializer;

final class Order
{
    public function __construct(
        #[Serializer\Type("int")]
        #[Serializer\SerializedName("BillBeeOrderId")]
        public ?int $id = null,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("BillBeeParentOrderId")]
        public ?int $parentOrderId = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Id")]
        public ?string $externalId = null,

        #[Serializer\Type("bool")]
        #[Serializer\SerializedName("AcceptLossOfReturnRight")]
        public ?bool $acceptLossOfReturnRight = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("OrderNumber")]
        public ?string $orderNumber = null,

        #[Serializer\Type("enum<BillbeeDe\BillbeeAPI\Type\OrderState>")]
        #[Serializer\SerializedName("State")]
        public OrderState $state = OrderState::ORDERED,

        #[Serializer\Type("enum<BillbeeDe\BillbeeAPI\Type\VatMode>")]
        #[Serializer\SerializedName("VatMode")]
        public ?VatMode $vatMode = VatMode::DEFAULT,

        #[Serializer\Type("DateTimeInterface")]
        #[Serializer\SerializedName("CreatedAt")]
        public ?DateTimeInterface $createdAt = null,

        #[Serializer\Type("DateTimeInterface")]
        #[Serializer\SerializedName("ShippedAt")]
        public ?DateTimeInterface $shippedAt = null,

        #[Serializer\Type("DateTimeInterface")]
        #[Serializer\SerializedName("ConfirmedAt")]
        public ?DateTimeInterface $confirmedAt = null,

        #[Serializer\Type("DateTimeInterface")]
        #[Serializer\SerializedName("PayedAt")]
        public ?DateTimeInterface $payedAt = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("SellerComment")]
        public ?string $sellerComment = null,

        /** @var Comment[] $comments */
        #[Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\Comment>")]
        #[Serializer\SerializedName("Comments")]
        public ?array $comments = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("InvoiceNumberPrefix")]
        public ?string $invoiceNumberPrefix = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("InvoiceNumberPostfix")]
        public ?string $invoiceNumberPostfix = null,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("InvoiceNumber")]
        public ?int $invoiceNumber = null,

        #[Serializer\Type("DateTimeInterface")]
        #[Serializer\SerializedName("InvoiceDate")]
        public ?DateTimeInterface $invoiceDate = null,

        #[Serializer\Type("BillbeeDe\BillbeeAPI\Model\Address")]
        #[Serializer\SerializedName("InvoiceAddress")]
        public ?Address $invoiceAddress = null,

        #[Serializer\Type("BillbeeDe\BillbeeAPI\Model\Address")]
        #[Serializer\SerializedName("ShippingAddress")]
        public ?Address $shippingAddress = null,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("PaymentMethod")]
        public ?int $paymentMethod = null,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("ShippingCost")]
        public ?float $shippingCost = null,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("TotalCost")]
        public ?float $totalCost = null,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("AdjustmentCost")]
        public ?float $adjustmentCost = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("AdjustmentReason")]
        public ?string $adjustmentReason = null,

        /** @var OrderItem[] */
        #[Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\OrderItem>")]
        #[Serializer\SerializedName("OrderItems")]
        public array $orderItems = [],

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Currency")]
        public ?string $currency = null,

        #[Serializer\Type("BillbeeDe\BillbeeAPI\Model\OrderUser")]
        #[Serializer\SerializedName("Seller")]
        public ?OrderUser $seller = null,

        #[Serializer\Type("BillbeeDe\BillbeeAPI\Model\OrderUser")]
        #[Serializer\SerializedName("Buyer")]
        public ?OrderUser $buyer = null,

        #[Serializer\Type("DateTimeInterface")]
        #[Serializer\SerializedName("UpdatedAt")]
        public ?DateTimeInterface $updatedAt = null,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("TaxRate1")]
        public ?float $taxRate1 = null,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("TaxRate2")]
        public ?float $taxRate2 = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("VatId")]
        public ?string $vatId = null,

        /** @var string[]|null */
        #[Serializer\Type("array")]
        #[Serializer\SerializedName("Tags")]
        public ?array $tags = [],

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("ShipWeightKg")]
        public ?float $shipWeightKg = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("LanguageCode")]
        public ?string $languageCode = null,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("PaidAmount")]
        public ?float $paidAmount = null,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("ShippingProfileId")]
        public ?int $shippingProfileId = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("ShippingProfileName")]
        public ?string $shippingProfileName = null,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("ShippingProviderId")]
        public ?int $shippingProviderId = null,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("ShippingProviderProductId")]
        public ?int $shippingProviderProductId = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("ShippingProviderName")]
        public ?string $shippingProviderName = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("ShippingProviderProductName")]
        public ?string $shippingProviderProductName = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("PaymentInstruction")]
        public ?string $paymentInstruction = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("IsCancelationFor")]
        public ?string $isCancellationFor = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("PaymentTransactionId")]
        public ?string $paymentTransactionId = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("DeliverySourceCountryCode")]
        public ?string $deliverySourceCountryCode = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("CustomInvoiceNote")]
        public ?string $customInvoiceNote = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("CustomerNumber")]
        public ?string $customerNumber = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("DistributionCenter")]
        public ?string $distributionCenter = null,

        #[Serializer\Type("BillbeeDe\BillbeeAPI\Model\Customer")]
        #[Serializer\SerializedName("Customer")]
        public ?Customer $customer = null,

        /** @var Payment[]|null */
        #[Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\Payment>")]
        #[Serializer\SerializedName("Payments")]
        public ?array $payments = [],

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("RebateDifference")]
        public ?float $rebateDifference = null,

        /** @var Shipment[]|null */
        #[Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\Shipment>")]
        #[Serializer\SerializedName("ShippingIds")]
        public ?array $shipments = [],

        /** @var array<OrderHistoryEntry> */
        #[Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\OrderHistoryEntry>")]
        #[Serializer\SerializedName("History")]
        public ?array $historyEntries = [],

        #[Serializer\Type("DateTimeInterface")]
        #[Serializer\SerializedName("LastModifiedAt")]
        public ?DateTimeInterface $lastModifiedAt = null,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("ApiAccountId")]
        public ?int $apiAccountId = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("ApiAccountName")]
        public ?string $apiAccountName = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("MerchantVatId")]
        public ?string $merchantVatId = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("CustomerVatId")]
        public ?string $customerVatId = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("PaymentReference")]
        public ?string $paymentReference = null,
    ) {
    }
}
