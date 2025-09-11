<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Type\ProductCondition;
use BillbeeDe\BillbeeAPI\Type\ProductType;
use BillbeeDe\BillbeeAPI\Type\VatIndex;
use BillbeeDe\BillbeeAPI\Type\Unit;
use BillbeeDe\BillbeeAPI\Type\DeliveryTime;
use BillbeeDe\BillbeeAPI\Type\Recipient;
use BillbeeDe\BillbeeAPI\Type\Occasion;
use JMS\Serializer\Annotation as Serializer;

final class Product
{
    public function __construct(
        #[Serializer\Type("int")]
        #[Serializer\SerializedName("Id")]
        public ?int $id = null,

        #[Serializer\Type("enum<BillbeeDe\BillbeeAPI\Type\ProductType>")]
        #[Serializer\SerializedName("Type")]
        public ProductType $type = ProductType::PRODUCT,

        /** @var ?TranslatableText[] $title */
        #[Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\TranslatableText>")]
        #[Serializer\SerializedName("Title")]
        public ?array $title = null,

        /** @var ?TranslatableText[] $invoiceText */
        #[Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\TranslatableText>")]
        #[Serializer\SerializedName("InvoiceText")]
        public array $invoiceText = [],

        /** @var ?TranslatableText[] $shortDescription */
        #[Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\TranslatableText>")]
        #[Serializer\SerializedName("ShortDescription")]
        public array $shortDescription = [],

        /** @var ?Image[] $images */
        #[Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\Image>")]
        #[Serializer\SerializedName("Images")]
        public array $images = [],

        /** @var ?TranslatableText[] $description */
        #[Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\TranslatableText>")]
        #[Serializer\SerializedName("Description")]
        public array $description = [],

        /** @var ?TranslatableText[] $attributes */
        #[Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\TranslatableText>")]
        #[Serializer\SerializedName("BasicAttributes")]
        public array $attributes = [],

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("SKU")]
        public ?string $sku = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("EAN")]
        public ?string $ean = null,

        #[Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\Source>")]
        #[Serializer\SerializedName("Sources")]
        public ?array $sources = [],

        #[Serializer\Type("BillbeeDe\BillbeeAPI\Model\Category")]
        #[Serializer\SerializedName("Category1")]
        public ?Category $category1 = null,

        #[Serializer\Type("BillbeeDe\BillbeeAPI\Model\Category")]
        #[Serializer\SerializedName("Category2")]
        public ?Category $category2 = null,

        #[Serializer\Type("BillbeeDe\BillbeeAPI\Model\Category")]
        #[Serializer\SerializedName("Category3")]
        public ?Category $category3 = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Manufacturer")]
        public ?string $manufacturer = null,

        #[Serializer\Type("enum<BillbeeDe\BillbeeAPI\Type\VatIndex>")]
        #[Serializer\SerializedName("VatIndex")]
        public VatIndex $vatIndex = VatIndex::NORMAL,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("Price")]
        public float $price = 0.00,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("CostPrice")]
        public ?float $costPrice = null,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("Vat1Rate")]
        public float $vatRateNormal = 0.00,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("Vat2Rate")]
        public float $vatRateReduced = 0.00,

        /** @var ?TranslatableText[] $materials */
        #[Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\TranslatableText>")]
        #[Serializer\SerializedName("Materials")]
        public array $materials = [],

        /** @var ?TranslatableText[] $tags */
        #[Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\TranslatableText>")]
        #[Serializer\SerializedName("Tags")]
        public array $tags = [],

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("StockDesired")]
        public ?float $stockDesired = null,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("StockCurrent")]
        public ?float $stockCurrent = null,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("StockWarning")]
        public ?float $stockWarning = null,

        #[Serializer\Type("bool")]
        #[Serializer\SerializedName("LowStock")]
        public bool $lowStock = false,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("StockCode")]
        public ?string $stockCode = null,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("StockReduceItemsPerSale")]
        public ?float $stockReduceItemsPerSale = null,

        /** @var ?StockProduct[] $stocks */
        #[Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\StockProduct>")]
        #[Serializer\SerializedName("Stocks")]
        public array $stocks = [],

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("Weight")]
        public ?int $weight = null,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("WeightNet")]
        public ?int $weightNet = null,

        #[Serializer\Type("enum<BillbeeDe\BillbeeAPI\Type\Unit>")]
        #[Serializer\SerializedName("Unit")]
        public ?Unit $unit = null,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("UnitsPerItem")]
        public ?float $unitsPerItem = null,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("SoldAmount")]
        public ?float $soldAmount = null,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("SoldSumGross")]
        public ?float $soldSumGross = null,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("SoldSumNet")]
        public ?float $soldSumNet = null,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("SoldSumNetLast30Days")]
        public ?float $soldSumNetLast30Days = null,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("SoldSumGrossLast30Days")]
        public ?float $soldSumGrossLast30Days = null,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("SoldAmountLast30Days")]
        public ?float $soldAmountLast30Days = null,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("ShippingProductId")]
        public ?int $shippingProductId = null,

        #[Serializer\Type("bool")]
        #[Serializer\SerializedName("IsDigital")]
        public bool $isDigital = false,

        #[Serializer\Type("bool")]
        #[Serializer\SerializedName("IsCustomizable")]
        public bool $isCustomizable = false,

        #[Serializer\Type("enum<BillbeeDe\BillbeeAPI\Type\DeliveryTime>")]
        #[Serializer\SerializedName("DeliveryTime")]
        public ?DeliveryTime $deliveryTime = null,

        #[Serializer\Type("enum<BillbeeDe\BillbeeAPI\Type\Recipient>")]
        #[Serializer\SerializedName("Recipient")]
        public ?Recipient $recipient = null,

        #[Serializer\Type("enum<BillbeeDe\BillbeeAPI\Type\Occasion>")]
        #[Serializer\SerializedName("Occasion")]
        public ?Occasion $occasion = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("CountryOfOrigin")]
        public ?string $countryOfOrigin = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("ExportDescription")]
        public ?string $exportDescription = null,

        /** @var ?TranslatableText[] $exportDescriptionMultiLanguage */
        #[Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\TranslatableText>")]
        #[Serializer\SerializedName("ExportDescriptionMultiLanguage")]
        public array $exportDescriptionMultiLanguage = [],

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("TaricNumber")]
        public ?string $taricNumber = null,

        /** @var ?ProductCustomField[] $customFields */
        #[Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\ProductCustomField>")]
        #[Serializer\SerializedName("CustomFields")]
        public array $customFields = [],

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("Condition")]
        public ?int $condition = null,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("WidthCm")]
        public ?float $widthCm = null,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("LengthCm")]
        public ?float $lengthCm = null,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("HeightCm")]
        public ?float $heightCm = null,

        /** @var ?BillOfMaterialProduct[] $billOfMaterial */
        #[Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\BillOfMaterialProduct>")]
        #[Serializer\SerializedName("BillOfMaterial")]
        public ?array $billOfMaterial = null,

        #[Serializer\Type("bool")]
        #[Serializer\SerializedName("IsDeactivated")]
        public ?bool $isDeactivated = null,
    ) {
    }
}
