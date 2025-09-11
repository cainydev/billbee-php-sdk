<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

final class SoldProduct
{
    public function __construct(
        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Id")]
        public ?string $id,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("OldId")]
        public ?string $oldId = null,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("BillbeeId")]
        public ?int $billbeeId = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Title")]
        public ?string $title = null,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("Weight")]
        public ?int $weight = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("SKU")]
        public ?string $sku = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("SkuOrId")]
        public ?string $skuOrId = null,

        #[Serializer\Type("bool")]
        #[Serializer\SerializedName("IsDigital")]
        public ?bool $isDigital = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("EAN")]
        public ?string $ean = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("TARICCode")]
        public ?string $taric = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("CountryOfOrigin")]
        public ?string $countryOfOrigin = null,
    ) {
    }
}
