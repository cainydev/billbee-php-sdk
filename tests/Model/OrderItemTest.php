<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\OrderItem;
use BillbeeDe\BillbeeAPI\Model\OrderItemAttribute;
use BillbeeDe\BillbeeAPI\Model\SoldProduct;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class OrderItemTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/order_item.json';
    }

    public static function getExpectedObject(): OrderItem
    {
        $product = new SoldProduct(
            id: "1234",
            oldId: "4321",
            billbeeId: 100000058592683,
            title: "Test Bestandsabgleich",
            weight: 500,
            sku: "TESTBESTAND",
            skuOrId: "TESTBESTAND",
            isDigital: true,
            ean: "testejcz",
            taric: "1234",
            countryOfOrigin: "AX"
        );

        return new OrderItem(
            billbeeId: 100000317105650,
            transactionId: "txid",
            product: $product,
            quantity: 12.0,
            totalPrice: 158.76,
            unrebatedTotalPrice: 162.0,
            taxAmount: 25.348235294117647,
            taxIndex: 1,
            discount: 2.0,
            attributes: [
                new OrderItemAttribute(
                    id: "100000167774144",
                    name: "x",
                    value: "y",
                    price: 0.00
                )
            ],
            getPriceFromArticleIfAny: true,
            isCoupon: false,
            dontAdjustStock: false,
            serialNumber: "ycwegf",
            invoiceSku: "TESTBESTAND"
        );
    }
}
