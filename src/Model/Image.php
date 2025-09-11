<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

final class Image
{
    public function __construct(
        #[Serializer\Type("int")]
        #[Serializer\SerializedName("Id")]
        public int $id,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Url")]
        public ?string $url = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("ThumbPathExt")]
        public ?string $thumbPathExt = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("ThumbUrl")]
        public ?string $thumbUrl = null,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("Position")]
        public ?int $position = null,

        #[Serializer\Type("bool")]
        #[Serializer\SerializedName("IsDefault")]
        public bool $isDefault = true,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("ArticleId")]
        public int $articleId = 0,
    ) {
    }
}
