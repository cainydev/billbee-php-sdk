<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\VatFlags;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class VatFlagsTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/vat_flags.json';
    }

    public static function getExpectedObject(): VatFlags
    {
        return new VatFlags(
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
            isDistanceSale: false
        );
    }
}
