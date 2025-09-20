<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\Comment;
use BillbeeDe\BillbeeAPI\Model\Order;
use BillbeeDe\BillbeeAPI\Model\OrderUser;
use BillbeeDe\BillbeeAPI\Type\OrderState;
use BillbeeDe\BillbeeAPI\Type\VatMode;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;
use DateTime;

class OrderTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/order.json';
    }

    public static function getExpectedObject(): Order
    {
        $address = AddressTest::getExpectedObject();
        $comment = new Comment(
            id: 1,
            created: new DateTime("2022-08-16T09:05:01.787Z"),
            fromCustomer: true,
            text: "test",
            name: "customer",
        );
        $seller = new OrderUser(
            platform: "avocadostore",
            shopName: "test",
            shopId: 100000000092372,
            id: "1234",
            nick: "nick name",
            firstName: "vorname",
            lastName: "nachname",
            fullName: "vorname nachname",
            email: "max@muster.tld",
        );

        return new Order(
            id: 100000186018330,
            parentOrderId: 2,
            externalId: "Id",
            acceptLossOfReturnRight: false,
            orderNumber: "Test",
            state: OrderState::ORDERED,
            vatMode: VatMode::DEFAULT,
            createdAt: new DateTime("2022-07-22T00:00:00+00:00"),
            shippedAt: new DateTime("2022-08-17T00:00:00+00:00"),
            confirmedAt: new DateTime("2022-08-17T09:47:25+00:00"),
            payedAt: new DateTime("2022-08-10T00:00:00+00:00"),
            sellerComment: "Eigene Notizen zu der Bestellung",
            comments: [$comment],
            invoiceNumberPrefix: "RN-2022-00",
            invoiceNumberPostfix: "-xx",
            invoiceNumber: 83,
            invoiceDate: new DateTime("2022-07-22T09:54:25+00:00"),
            invoiceAddress: $address,
            shippingAddress: clone $address,
            paymentMethod: 22,
            shippingCost: 12,
            totalCost: 170.76,
            adjustmentCost: 0,
            adjustmentReason: "test",
            orderItems: [OrderItemTest::getExpectedObject()],
            currency: "EUR",
            seller: $seller,
            buyer: clone $seller,
            updatedAt: new DateTime("2022-08-17T09:47:25+00:00"),
            taxRate1: 19,
            taxRate2: 7,
            vatId: "1234",
            tags: ["test"],
            shipWeightKg: 6,
            languageCode: "DE",
            paidAmount: 162,
            shippingProfileId: 12345,
            shippingProfileName: "ShippingProfileName",
            shippingProviderId: 100000000022240,
            shippingProviderProductId: 100000000288647,
            shippingProviderName: "DHL",
            shippingProviderProductName: "DHL Paket",
            paymentInstruction: "remark",
            isCancellationFor: "IsCancelationFor",
            paymentTransactionId: "txid",
            deliverySourceCountryCode: "AZ",
            customInvoiceNote: "CustomInvoiceNote",
            customerNumber: "1",
            distributionCenter: "1234",
            customer: CustomerTest::getExpectedObject(),
            payments: [PaymentTest::getExpectedObject()],
            rebateDifference: 15.18,
            shipments: [],
            historyEntries: [OrderHistoryEntryTest::getExpectedObject()],
            lastModifiedAt: new DateTime("2022-08-17T09:47:25+00:00"),
            apiAccountId: 92372,
            apiAccountName: "test",
            merchantVatId: "1234",
            customerVatId: "1234",
            paymentReference: "reference",
        );
    }
}
