<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

final class Source
{
    public function __construct(
        #[Serializer\Type("int")]
        #[Serializer\SerializedName("Id")]
        public ?int $id = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Source")]
        public ?string $source = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("SourceId")]
        public ?string $sourceId = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("ApiAccountName")]
        public ?string $apiAccountName = null,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("ApiAccountId")]
        public ?int $apiAccountId = null,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("ExportFactor")]
        public ?float $exportFactor = null,

        #[Serializer\Type("bool")]
        #[Serializer\SerializedName("StockSyncInactive")]
        public ?bool $stockSyncInactive = null,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("StockSyncMin")]
        public ?float $stockSyncMin = null,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("StockSyncMax")]
        public ?float $stockSyncMax = null,

        #[Serializer\Type("float")]
        #[Serializer\SerializedName("UnitsPerItem")]
        public ?float $unitsPerItem = null,

        #[Serializer\Type("array")]
        #[Serializer\SerializedName("Custom")]
        public ?array $custom = null,
    ) {
    }
}
