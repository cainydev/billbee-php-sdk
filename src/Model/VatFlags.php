<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

final class VatFlags
{
    public function __construct(
        #[Serializer\Type("bool")]
        #[Serializer\SerializedName("ThirdPartyCountry")]
        public bool $thirdPartyCountry = false,

        #[Serializer\Type("bool")]
        #[Serializer\SerializedName("SrcCountryIsEqualToDstCountry")]
        public bool $srcCountryIsEqualToDstCountry = false,

        #[Serializer\Type("bool")]
        #[Serializer\SerializedName("CustomerHasVatId")]
        public bool $customerHasVatId = false,

        #[Serializer\Type("bool")]
        #[Serializer\SerializedName("EuDeliveryThresholdExceeded")]
        public bool $euDeliveryThresholdExceeded = false,

        #[Serializer\Type("bool")]
        #[Serializer\SerializedName("OssEnabled")]
        public bool $ossEnabled = false,

        #[Serializer\Type("bool")]
        #[Serializer\SerializedName("SellerIsRegisteredInDstCountry")]
        public bool $sellerIsRegisteredInDstCountry = false,

        #[Serializer\Type("bool")]
        #[Serializer\SerializedName("OrderDistributionCountryIsEmpty")]
        public bool $orderDistributionCountryIsEmpty = false,

        #[Serializer\Type("bool")]
        #[Serializer\SerializedName("UserProfileCountryIsEmpty")]
        public bool $userProfileCountryIsEmpty = false,

        #[Serializer\Type("bool")]
        #[Serializer\SerializedName("SetIglWhenVatIdIsAvailableEnabled")]
        public bool $setIglWhenVatIdIsAvailableEnabled = false,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("RatesFrom")]
        public string $ratesFrom = "",

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("VatIdFrom")]
        public string $vatIdFrom = "",

        #[Serializer\Type("bool")]
        #[Serializer\SerializedName("IsDistanceSale")]
        public bool $isDistanceSale = false,
    ) {
    }
}
