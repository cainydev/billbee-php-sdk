<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

final class WebHookFilter
{
    public function __construct(
        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Name")]
        public ?string $name = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Description")]
        public ?string $description = null,
    ) {
    }
}
