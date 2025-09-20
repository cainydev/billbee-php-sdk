<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\Invoice;
use BillbeeDe\BillbeeAPI\Model\InvoiceAdditionalFee;
use BillbeeDe\BillbeeAPI\Model\InvoicePosition;
use BillbeeDe\BillbeeAPI\Model\VatFlags;
use BillbeeDe\BillbeeAPI\Type\InvoiceType;
use BillbeeDe\BillbeeAPI\Type\VatMode;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;
use DateTime;

class InvoiceTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/invoice.json';
    }

    public static function getExpectedObject(): Invoice
    {
        $additionalFee = new InvoiceAdditionalFee(
            type: "ShipCost",
            gross: 11.996,
            net: 10.08,
            vatAmount: 1.916,
            vatRate: 19,
        );

        $position = new InvoicePosition(
            id: 100000317105650,
            position: 1,
            amount: 12,
            netValue: 11.1176,
            totalNetValue: 133.4118,
            grossValue: 13.23,
            totalGrossValue: 158.76,
            vatRate: 19,
            articleId: 58592683,
            sku: "TESTBESTAND",
            title: "Test Bestandsabgleich",
            totalVatAmount: 25.3482,
            rebatePercent: 2,
        );

        $vatFlags = new VatFlags(
            thirdPartyCountry: false,
            srcCountryIsEqualToDstCountry: true,
            customerHasVatId: false,
            euDeliveryThresholdExceeded: true,
            ossEnabled: true,
            sellerIsRegisteredInDstCountry: false,
            orderDistributionCountryIsEmpty: true,
            userProfileCountryIsEmpty: false,
            setIglWhenVatIdIsAvailableEnabled: true,
            ratesFrom: "destination_country",
            vatIdFrom: "destination_country",
            isDistanceSale: false,
        );

        return new Invoice(
            id: 100000186018330,
            invoiceNumber: "RN-2022-0083",
            type: InvoiceType::INVOICE,
            lastName: "Max",
            firstName: "Muster",
            company: "Firma",
            customerNumber: 1,
            debtorNumber: 1,
            invoiceDate: new DateTime("2022-07-22T09:54:25.31"),
            totalNet: 133.41,
            totalGross: 158.76,
            currency: "EUR",
            paymentTypeId: 22,
            orderNumber: "Test",
            transactionId: "txid",
            email: "max@mustermann.tld",
            shopName: "test",
            positions: [$position],
            payDate: new DateTime("2022-08-10T00:00:00"),
            vatMode: VatMode::DEFAULT,
            vatFlags: $vatFlags,
            shippingCountry: "DE",
            title: "",
            salutation: "Sir",
            additionalFees: [$additionalFee],
            merchantVatId: "1234",
            customerVatId: "1234",
        );
    }
}
