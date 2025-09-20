<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\Product;
use BillbeeDe\BillbeeAPI\Model\TranslatableText;
use BillbeeDe\BillbeeAPI\Type\DeliveryTime;
use BillbeeDe\BillbeeAPI\Type\Occasion;
use BillbeeDe\BillbeeAPI\Type\ProductType;
use BillbeeDe\BillbeeAPI\Type\Recipient;
use BillbeeDe\BillbeeAPI\Type\Unit;
use BillbeeDe\BillbeeAPI\Type\VatIndex;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class ProductTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/complete_product.json';
    }

    public static function getExpectedObject(): Product
    {
        return new Product(
            id: 100000060427005,
            type: ProductType::PRODUCT,
            title: [
                new TranslatableText(text: "complete", languageCode: "EN"),
                new TranslatableText(text: "komplett", languageCode: "DE"),
            ],
            invoiceText: [
                new TranslatableText(text: "Override", languageCode: "EN"),
                new TranslatableText(text: "Ueberschreiben", languageCode: "DE"),
            ],
            shortDescription: [
                new TranslatableText(text: "Complete short", languageCode: "EN"),
                new TranslatableText(text: "Komplett kurz", languageCode: "DE"),
            ],
            images: [ImageTest::getExpectedObject()],
            description: [
                new TranslatableText(text: "Complete long", languageCode: "EN"),
                new TranslatableText(text: "Komplett lang", languageCode: "DE"),
            ],
            attributes: [
                new TranslatableText(text: "Details", languageCode: "EN"),
                new TranslatableText(text: "Wesentliche Merkmale", languageCode: "DE"),
            ],
            sku: "SKU",
            ean: "EAN",
            sources: [SourceTest::getExpectedObject()],
            category1: CategoryTest::getExpectedObject(),
            category2: CategoryTest::getExpectedObject(),
            category3: CategoryTest::getExpectedObject(),
            manufacturer: 'Hersteller',
            vatIndex: VatIndex::NORMAL,
            price: 5.95,
            costPrice: 2.38,
            vatRateNormal: 19.0,
            vatRateReduced: 7.0,
            materials: [
                new TranslatableText(text: "Material", languageCode: "EN"),
                new TranslatableText(text: "Material", languageCode: "DE"),
            ],
            tags: [
                new TranslatableText(text: "Tags", languageCode: "EN"),
                new TranslatableText(text: "Tags", languageCode: "DE"),
            ],
            stockDesired: 3,
            stockCurrent: 2,
            stockWarning: 1,
            lowStock: false,
            stockCode: 'StockCode',
            stockReduceItemsPerSale: 1.0,
            stocks: [StockProductTest::getExpectedObject()],
            weight: 100,
            weightNet: 50,
            unit: Unit::PIECE,
            unitsPerItem: 1.0,
            soldAmount: 1.0,
            soldSumGross: 20.0,
            soldSumNet: 20.0,
            soldSumNetLast30Days: 20.0,
            soldSumGrossLast30Days: 20.0,
            soldAmountLast30Days: 1.0,
            shippingProductId: 100000000288650,
            isDigital: true,
            isCustomizable: true,
            deliveryTime: DeliveryTime::DAYS_10_14,
            recipient: Recipient::WOMAN,
            occasion: Occasion::GRADUATION,
            countryOfOrigin: 'AF',
            exportDescription: 'Export Beschreibung',
            exportDescriptionMultiLanguage: [],
            taricNumber: 'TARIC',
            customFields: [ProductCustomFieldTest::getExpectedObject()],
            condition: 2,
            widthCm: 30,
            lengthCm: 20,
            heightCm: 40,
            billOfMaterial: [BillOfMaterialProductTest::getExpectedObject()],
            isDeactivated: true,
        );
    }
}
