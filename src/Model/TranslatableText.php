<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

final class TranslatableText
{
    public function __construct(
        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Text")]
        public ?string $text = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("LanguageCode")]
        public ?string $languageCode = null,
    ) {
    }
}
