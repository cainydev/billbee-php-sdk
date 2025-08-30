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

use BillbeeDe\BillbeeAPI\Type\ProductCondition;
use JMS\Serializer\Annotation as Serializer;

class Product
{
    // Product Types
    public const TYPE_PRODUCT = 1;
    public const TYPE_BUNDLE = 2;

    // VAT Indexes
    public const VAT_INDEX_NORMAL = 1;
    public const VAT_INDEX_REDUCED = 2;

    // Units
    public const UNIT_PIECE = 1;
    public const UNIT_PAIR = 15;
    public const UNIT_GRAM = 16;
    public const UNIT_100_GRAM = 4;
    public const UNIT_KG = 2;
    public const UNIT_MILLILITER = 6;
    public const UNIT_LITER = 5;
    public const UNIT_METER = 3;
    public const UNIT_SQUARE_METER = 7;
    public const UNIT_CUBIC_METER = 8;
    public const UNIT_YARD = 9;
    public const UNIT_FAT_QUARTER = 10;
    public const UNIT_OUNCE = 11;
    public const UNIT_LBS = 12;
    public const UNIT_FLUID_OUNCE = 13;
    public const UNIT_GALLON = 14;

    // Delivery Time
    public const DELIVERY_NA = null;
    public const DELIVERY_1_2_DAYS = 1;
    public const DELIVERY_3_5_DAYS = 2;
    public const DELIVERY_6_9_DAYS = 3;
    public const DELIVERY_10_14_DAYS = 4;
    public const DELIVERY_15_21_DAYS = 5;
    public const DELIVERY_4_WEEKS = 6;
    public const DELIVERY_5_WEEKS = 7;
    public const DELIVERY_6_WEEKS = 8;
    public const DELIVERY_7_WEEKS = 9;
    public const DELIVERY_8_WEEKS = 10;
    public const DELIVERY_9_WEEKS = 11;
    public const DELIVERY_10_WEEKS = 12;

    // Recipient
    public const RECIPIENT_NA = null;
    public const RECIPIENT_BABIES = 1;
    public const RECIPIENT_BABY_BOYS = 2;
    public const RECIPIENT_BABY_GIRLS = 3;
    public const RECIPIENT_WOMAN = 4;
    public const RECIPIENT_PETS = 5;
    public const RECIPIENT_DOGS = 6;
    public const RECIPIENT_TEENAGERS = 7;
    public const RECIPIENT_BOYS = 8;
    public const RECIPIENT_CATS = 9;
    public const RECIPIENT_CHILDREN = 10;
    public const RECIPIENT_GIRLS = 11;
    public const RECIPIENT_MEN = 12;
    public const RECIPIENT_TEEN_BOYS = 13;
    public const RECIPIENT_TEEN_GIRLS = 14;
    public const RECIPIENT_UNISEX = 15;
    public const RECIPIENT_BIRDS = 16;

    // Occasion
    public const OCCASION_NA = null;
    public const OCCASION_GRADUATION = 1;
    public const OCCASION_SYMPATHY = 2;
    public const OCCASION_BAR_OR_BAT_MITZVAH = 3;
    public const OCCASION_CANADA_DAY = 4;
    public const OCCASION_CHINESE_NEW_YEAR = 5;
    public const OCCASION_CINCO_DE_MAYO = 6;
    public const OCCASION_DAY_OF_THE_DEAD = 7;
    public const OCCASION_JULY_4TH = 8;
    public const OCCASION_EID = 9;
    public const OCCASION_BIRTHDAY = 10;
    public const OCCASION_GET_WELL = 11;
    public const OCCASION_HALLOWEEN = 12;
    public const OCCASION_HANUKKAH = 13;
    public const OCCASION_HOUSEWARMING = 14;
    public const OCCASION_WEDDING = 15;
    public const OCCASION_ANNIVERSARY = 16;
    public const OCCASION_CONFIRMATION = 17;
    public const OCCASION_KWANZAA = 18;
    public const OCCASION_MOTHERS_DAY = 19;
    public const OCCASION_NEW_BABY = 20;
    public const OCCASION_NEW_YEARS = 21;
    public const OCCASION_EASTER = 22;
    public const OCCASION_PROM = 23;
    public const OCCASION_QUINCEANERA = 24;
    public const OCCASION_RETIREMENT = 25;
    public const OCCASION_ST_PATRICKS_DAY = 26;
    public const OCCASION_SWEET_16 = 27;
    public const OCCASION_BAPTISM = 28;
    public const OCCASION_THANKSGIVING = 29;
    public const OCCASION_VALENTINES = 30;
    public const OCCASION_FATHERS_DAY = 31;
    public const OCCASION_ENGAGEMENT = 32;
    public const OCCASION_CHRISTMAS = 33;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("Id")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public int $id;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("Type")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public int $type = Product::TYPE_PRODUCT;

    /**
     * @var TranslatableText[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\TranslatableText>")
     * @Serializer\SerializedName("Title")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?array $title = null;

    /**
     * @var TranslatableText[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\TranslatableText>")
     * @Serializer\SerializedName("InvoiceText")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public array $invoiceText = [];

    /**
     * @var TranslatableText[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\TranslatableText>")
     * @Serializer\SerializedName("ShortDescription")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public array $shortDescription = [];

    /**
     * @var Image[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\Image>")
     * @Serializer\SerializedName("Images")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public array $images = [];

    /**
     * @var TranslatableText[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\TranslatableText>")
     * @Serializer\SerializedName("Description")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public array $description = [];

    /**
     * @var TranslatableText[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\TranslatableText>")
     * @Serializer\SerializedName("BasicAttributes")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public array $attributes = [];

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("SKU")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?string $sku = null;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("EAN")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?string $ean = null;

    /**
     * @var ?Source[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\Source>")
     * @Serializer\SerializedName("Sources")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?array $sources = [];

    /**
     * @var ?Category
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Model\Category")
     * @Serializer\SerializedName("Category1")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?Category $category1 = null;

    /**
     * @var ?Category
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Model\Category")
     * @Serializer\SerializedName("Category2")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?Category $category2 = null;

    /**
     * @var ?Category
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Model\Category")
     * @Serializer\SerializedName("Category3")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?Category $category3 = null;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Manufacturer")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?string $manufacturer = null;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("VatIndex")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public int $vatIndex = Product::VAT_INDEX_NORMAL;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("Price")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public float $price = 0.00;

    /**
     * @var ?float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("CostPrice")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?float $costPrice = null;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("Vat1Rate")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public float $vatRateNormal = 0.00;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("Vat2Rate")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public float $vatRateReduced = 0.00;

    /**
     * @var TranslatableText[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\TranslatableText>")
     * @Serializer\SerializedName("Materials")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public array $materials = [];

    /**
     * @var TranslatableText[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\TranslatableText>")
     * @Serializer\SerializedName("Tags")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public array $tags = [];

    /**
     * @var ?float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("StockDesired")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?float $stockDesired = null;

    /**
     * @var ?float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("StockCurrent")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?float $stockCurrent = null;

    /**
     * @var ?float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("StockWarning")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?float $stockWarning = null;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("LowStock")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public bool $lowStock = false;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("StockCode")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?string $stockCode = null;

    /**
     * @var ?float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("StockReduceItemsPerSale")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?float $stockReduceItemsPerSale = null;

    /**
     * @var StockProduct[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\StockProduct>")
     * @Serializer\SerializedName("Stocks")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public array $stocks = [];

    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("Weight")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?int $weight = null;

    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("WeightNet")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?int $weightNet = null;

    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("Unit")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?int $unit = null;

    /**
     * @var ?float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("UnitsPerItem")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?float $unitsPerItem = null;

    /**
     * @var ?float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("SoldAmount")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?float $soldAmount = null;

    /**
     * @var ?float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("SoldSumGross")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?float $soldSumGross = null;

    /**
     * @var ?float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("SoldSumNet")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?float $soldSumNet = null;

    /**
     * @var ?float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("SoldSumNetLast30Days")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?float $soldSumNetLast30Days = null;

    /**
     * @var ?float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("SoldSumGrossLast30Days")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?float $soldSumGrossLast30Days = null;

    /**
     * @var ?float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("SoldAmountLast30Days")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?float $soldAmountLast30Days = null;

    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("ShippingProductId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?int $shippingProductId = null;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("IsDigital")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public bool $isDigital = false;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("IsCustomizable")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public bool $isCustomizable = false;

    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("DeliveryTime")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?int $deliveryTime = null;

    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("Recipient")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?int $recipient = null;

    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("Occasion")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?int $occasion = null;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CountryOfOrigin")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?string $countryOfOrigin = null;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ExportDescription")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?string $exportDescription = null;
    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("TaricNumber")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?string $taricNumber = null;
    /**
     * @var ProductCustomField[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\ProductCustomField>")
     * @Serializer\SerializedName("CustomFields")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public array $customFields = [];
    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("Condition")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     *
     * @see ProductCondition
     */
    public ?int $condition = null;
    /**
     * @var ?float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("WidthCm")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?float $widthCm;
    /**
     * @var ?float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("LengthCm")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?float $lengthCm;
    /**
     * @var ?float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("HeightCm")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?float $heightCm;
    /**
     * @var ?BillOfMaterialProduct[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\BillOfMaterialProduct>")
     * @Serializer\SerializedName("BillOfMaterial")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public ?array $billOfMaterial = null;
    /**
     * @var TranslatableText[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\TranslatableText>")
     * @Serializer\SerializedName("ExportDescriptionMultiLanguage")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    private array $exportDescriptionMultiLanguage = [];
    /**
     * @var ?bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("IsDeactivated")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    private ?bool $isDeactivated = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;
        return $this;
    }

    /** @return ?TranslatableText[] */
    public function getTitle(): ?array
    {
        return $this->title;
    }

    /** @param ?TranslatableText[] $title */
    public function setTitle(?array $title): self
    {
        $this->title = $title;
        return $this;
    }

    /** @return TranslatableText[] */
    public function getInvoiceText(): array
    {
        return $this->invoiceText;
    }

    /** @param TranslatableText[] $invoiceText */
    public function setInvoiceText(array $invoiceText): self
    {
        $this->invoiceText = $invoiceText;
        return $this;
    }

    /** @return TranslatableText[] */
    public function getShortDescription(): array
    {
        return $this->shortDescription;
    }

    /** @param TranslatableText[] $shortDescription */
    public function setShortDescription(array $shortDescription): self
    {
        $this->shortDescription = $shortDescription;
        return $this;
    }

    /** @return Image[] */
    public function getImages(): array
    {
        return $this->images;
    }

    /** @param Image[] $images */
    public function setImages(array $images): self
    {
        $this->images = $images;
        return $this;
    }

    /** @return TranslatableText[] */
    public function getDescription(): array
    {
        return $this->description;
    }

    /** @param TranslatableText[] $description */
    public function setDescription(array $description): self
    {
        $this->description = $description;
        return $this;
    }

    /** @return TranslatableText[] */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /** @param TranslatableText[] $attributes */
    public function setAttributes(array $attributes): self
    {
        $this->attributes = $attributes;
        return $this;
    }

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function setSku(?string $sku): self
    {
        $this->sku = $sku;
        return $this;
    }

    public function getEan(): ?string
    {
        return $this->ean;
    }

    public function setEan(?string $ean): self
    {
        $this->ean = $ean;
        return $this;
    }

    /** @return ?Source[] */
    public function getSources(): ?array
    {
        return $this->sources;
    }

    /** @param ?Source[] $sources */
    public function setSources(?array $sources): self
    {
        $this->sources = $sources;
        return $this;
    }

    public function getCategory1(): ?Category
    {
        return $this->category1;
    }

    public function setCategory1(?Category $category1): self
    {
        $this->category1 = $category1;
        return $this;
    }

    public function getCategory2(): ?Category
    {
        return $this->category2;
    }

    public function setCategory2(?Category $category2): self
    {
        $this->category2 = $category2;
        return $this;
    }

    public function getCategory3(): ?Category
    {
        return $this->category3;
    }

    public function setCategory3(?Category $category3): self
    {
        $this->category3 = $category3;
        return $this;
    }

    public function getManufacturer(): ?string
    {
        return $this->manufacturer;
    }

    public function setManufacturer(?string $manufacturer): self
    {
        $this->manufacturer = $manufacturer;
        return $this;
    }

    public function getVatIndex(): int
    {
        return $this->vatIndex;
    }

    public function setVatIndex(int $vatIndex): self
    {
        $this->vatIndex = $vatIndex;
        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;
        return $this;
    }

    public function getCostPrice(): ?float
    {
        return $this->costPrice;
    }

    public function setCostPrice(?float $costPrice): self
    {
        $this->costPrice = $costPrice;
        return $this;
    }

    public function getVatRateNormal(): float
    {
        return $this->vatRateNormal;
    }

    public function setVatRateNormal(float $vatRateNormal): self
    {
        $this->vatRateNormal = $vatRateNormal;
        return $this;
    }

    public function getVatRateReduced(): float
    {
        return $this->vatRateReduced;
    }

    public function setVatRateReduced(float $vatRateReduced): self
    {
        $this->vatRateReduced = $vatRateReduced;
        return $this;
    }

    /** @return TranslatableText[] */
    public function getMaterials(): array
    {
        return $this->materials;
    }

    /** @param TranslatableText[] $materials */
    public function setMaterials(array $materials): self
    {
        $this->materials = $materials;
        return $this;
    }

    /** @return TranslatableText[] */
    public function getTags(): array
    {
        return $this->tags;
    }

    /** @param TranslatableText[] $tags */
    public function setTags(array $tags): self
    {
        $this->tags = $tags;
        return $this;
    }

    public function getStockDesired(): ?float
    {
        return $this->stockDesired;
    }

    public function setStockDesired(?float $stockDesired): self
    {
        $this->stockDesired = $stockDesired;
        return $this;
    }

    public function getStockCurrent(): ?float
    {
        return $this->stockCurrent;
    }

    public function setStockCurrent(?float $stockCurrent): self
    {
        $this->stockCurrent = $stockCurrent;
        return $this;
    }

    public function getStockWarning(): ?float
    {
        return $this->stockWarning;
    }

    public function setStockWarning(?float $stockWarning): self
    {
        $this->stockWarning = $stockWarning;
        return $this;
    }

    public function isLowStock(): bool
    {
        return $this->lowStock;
    }

    public function setLowStock(bool $lowStock): self
    {
        $this->lowStock = $lowStock;
        return $this;
    }

    public function getStockCode(): ?string
    {
        return $this->stockCode;
    }

    public function setStockCode(?string $stockCode): self
    {
        $this->stockCode = $stockCode;
        return $this;
    }

    public function getStockReduceItemsPerSale(): ?float
    {
        return $this->stockReduceItemsPerSale;
    }

    public function setStockReduceItemsPerSale(?float $stockReduceItemsPerSale): self
    {
        $this->stockReduceItemsPerSale = $stockReduceItemsPerSale;
        return $this;
    }

    /** @return StockProduct[] */
    public function getStocks(): array
    {
        return $this->stocks;
    }

    /** @param StockProduct[] $stocks */
    public function setStocks(array $stocks): self
    {
        $this->stocks = $stocks;
        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(?int $weight): self
    {
        $this->weight = $weight;
        return $this;
    }

    public function getWeightNet(): ?int
    {
        return $this->weightNet;
    }

    public function setWeightNet(?int $weightNet): self
    {
        $this->weightNet = $weightNet;
        return $this;
    }

    public function getUnit(): ?int
    {
        return $this->unit;
    }

    public function setUnit(?int $unit): self
    {
        $this->unit = $unit;
        return $this;
    }

    public function getUnitsPerItem(): ?float
    {
        return $this->unitsPerItem;
    }

    public function setUnitsPerItem(?float $unitsPerItem): self
    {
        $this->unitsPerItem = $unitsPerItem;
        return $this;
    }

    public function getSoldAmount(): ?float
    {
        return $this->soldAmount;
    }

    public function setSoldAmount(?float $soldAmount): self
    {
        $this->soldAmount = $soldAmount;
        return $this;
    }

    public function getSoldSumGross(): ?float
    {
        return $this->soldSumGross;
    }

    public function setSoldSumGross(?float $soldSumGross): self
    {
        $this->soldSumGross = $soldSumGross;
        return $this;
    }

    public function getSoldSumNet(): ?float
    {
        return $this->soldSumNet;
    }

    public function setSoldSumNet(?float $soldSumNet): self
    {
        $this->soldSumNet = $soldSumNet;
        return $this;
    }

    public function getSoldSumNetLast30Days(): ?float
    {
        return $this->soldSumNetLast30Days;
    }

    public function setSoldSumNetLast30Days(?float $soldSumNetLast30Days): self
    {
        $this->soldSumNetLast30Days = $soldSumNetLast30Days;
        return $this;
    }

    public function getSoldSumGrossLast30Days(): ?float
    {
        return $this->soldSumGrossLast30Days;
    }

    public function setSoldSumGrossLast30Days(?float $soldSumGrossLast30Days): self
    {
        $this->soldSumGrossLast30Days = $soldSumGrossLast30Days;
        return $this;
    }

    public function getSoldAmountLast30Days(): ?float
    {
        return $this->soldAmountLast30Days;
    }

    public function setSoldAmountLast30Days(?float $soldAmountLast30Days): self
    {
        $this->soldAmountLast30Days = $soldAmountLast30Days;
        return $this;
    }

    public function getShippingProductId(): ?int
    {
        return $this->shippingProductId;
    }

    public function setShippingProductId(?int $shippingProductId): self
    {
        $this->shippingProductId = $shippingProductId;
        return $this;
    }

    public function isDigital(): bool
    {
        return $this->isDigital;
    }

    public function setIsDigital(bool $isDigital): self
    {
        $this->isDigital = $isDigital;
        return $this;
    }

    public function isCustomizable(): bool
    {
        return $this->isCustomizable;
    }

    public function setIsCustomizable(bool $isCustomizable): self
    {
        $this->isCustomizable = $isCustomizable;
        return $this;
    }

    public function getDeliveryTime(): ?int
    {
        return $this->deliveryTime;
    }

    public function setDeliveryTime(?int $deliveryTime): self
    {
        $this->deliveryTime = $deliveryTime;
        return $this;
    }

    public function getRecipient(): ?int
    {
        return $this->recipient;
    }

    public function setRecipient(?int $recipient): self
    {
        $this->recipient = $recipient;
        return $this;
    }

    public function getOccasion(): ?int
    {
        return $this->occasion;
    }

    public function setOccasion(?int $occasion): self
    {
        $this->occasion = $occasion;
        return $this;
    }

    public function getCountryOfOrigin(): ?string
    {
        return $this->countryOfOrigin;
    }

    public function setCountryOfOrigin(?string $countryOfOrigin): self
    {
        $this->countryOfOrigin = $countryOfOrigin;
        return $this;
    }

    public function getExportDescription(): ?string
    {
        return $this->exportDescription;
    }

    public function setExportDescription(?string $exportDescription): self
    {
        $this->exportDescription = $exportDescription;
        return $this;
    }

    /** @return TranslatableText[] */
    public function getExportDescriptionMultiLanguage(): array
    {
        return $this->exportDescriptionMultiLanguage;
    }

    /** @param TranslatableText[] $exportDescriptionMultiLanguage */
    public function setExportDescriptionMultiLanguage(array $exportDescriptionMultiLanguage): self
    {
        $this->exportDescriptionMultiLanguage = $exportDescriptionMultiLanguage;
        return $this;
    }

    public function getTaricNumber(): ?string
    {
        return $this->taricNumber;
    }

    public function setTaricNumber(?string $taricNumber): self
    {
        $this->taricNumber = $taricNumber;
        return $this;
    }

    /** @return ProductCustomField[] */
    public function getCustomFields(): array
    {
        return $this->customFields;
    }

    /** @param ProductCustomField[] $customFields */
    public function setCustomFields(array $customFields): self
    {
        $this->customFields = $customFields;
        return $this;
    }

    public function getCondition(): ?int
    {
        return $this->condition;
    }

    public function setCondition(?int $condition): self
    {
        $this->condition = $condition;
        return $this;
    }

    public function getWidthCm(): ?float
    {
        return $this->widthCm;
    }

    public function setWidthCm(?float $widthCm): self
    {
        $this->widthCm = $widthCm;
        return $this;
    }

    public function getLengthCm(): ?float
    {
        return $this->lengthCm;
    }

    public function setLengthCm(?float $lengthCm): self
    {
        $this->lengthCm = $lengthCm;
        return $this;
    }

    public function getHeightCm(): ?float
    {
        return $this->heightCm;
    }

    public function setHeightCm(?float $heightCm): self
    {
        $this->heightCm = $heightCm;
        return $this;
    }

    /** @return ?BillOfMaterialProduct[] */
    public function getBillOfMaterial(): ?array
    {
        return $this->billOfMaterial;
    }

    /** @param ?BillOfMaterialProduct[] $billOfMaterial */
    public function setBillOfMaterial(?array $billOfMaterial): self
    {
        $this->billOfMaterial = $billOfMaterial;
        return $this;
    }

    public function getIsDeactivated(): ?bool
    {
        return $this->isDeactivated;
    }

    public function setIsDeactivated(?bool $isDeactivated): self
    {
        $this->isDeactivated = $isDeactivated;
        return $this;
    }
}
