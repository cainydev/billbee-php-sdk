<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Type\SendMode;
use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;

final class MessageForCustomer
{
    public function __construct(
        #[Serializer\Type("enum<BillbeeDe\BillbeeAPI\Type\SendMode>")]
        #[Serializer\SerializedName("SendMode")]
        public SendMode $sendMode,

        #[Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\TranslatableText>")]
        #[Serializer\SerializedName("Subject")]
        public array $subject,

        #[Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\TranslatableText>")]
        #[Serializer\SerializedName("Body")]
        public array $body,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("AlternativeMail")]
        public string $alternativeEmailAddress,
    ) {
    }
}
