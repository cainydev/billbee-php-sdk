<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

final class OrderUser
{
    public function __construct(
        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Platform")]
        public ?string $platform = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("BillbeeShopName")]
        public ?string $shopName = null,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("BillbeeShopId")]
        public ?int $shopId = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Id")]
        public ?string $id = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Nick")]
        public ?string $nick = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("FirstName")]
        public ?string $firstName = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("LastName")]
        public ?string $lastName = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("FullName")]
        public ?string $fullName = null,

        #[Serializer\Type("string")]
        #[Serializer\SerializedName("Email")]
        public ?string $email = null,
    ) {
    }
}
