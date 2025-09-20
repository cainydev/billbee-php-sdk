<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

final class WebHook
{
    public function __construct(
        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Id")]
        public ?string $id = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("WebHookUri")]
        public ?string $webHookUri = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Secret")]
        public ?string $secret = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Description")]
        public ?string $description = null,

        #[Serializer\Type("bool")]
        #[Serializer\SerializedName("IsPaused")]
        public bool $isPaused = false,

        /** @var array<array<string, mixed>>|null */
        #[Serializer\Type("array")]
        #[Serializer\SerializedName("Filters")]
        public ?array $filters = null,

        /** @var array<array<string, string>> */
        #[Serializer\Type("array<string, string>")]
        #[Serializer\SerializedName("Headers")]
        public array $headers = [],

        /** @var array<array<string, mixed>> */
        #[Serializer\Type("array<string, AsIs>")]
        #[Serializer\SerializedName("Properties")]
        public array $properties = [],
    ) {
    }
}
