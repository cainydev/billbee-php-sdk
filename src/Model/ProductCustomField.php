<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

final class ProductCustomField
{
    public function __construct(
        #[Serializer\Type("int")]
        #[Serializer\SerializedName("Id")]
        public ?int $id,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("DefinitionId")]
        public ?int $definitionId,

        #[Serializer\Type("BillbeeDe\BillbeeAPI\Model\CustomFieldDefinition")]
        #[Serializer\SerializedName("Definition")]
        public ?CustomFieldDefinition $definition,

        #[Serializer\Type("int")]
        #[Serializer\SerializedName("ArticleId")]
        public ?int $articleId,

        #[Serializer\Type("AsIs")]
        #[Serializer\SerializedName("Value")]
        public mixed $value,
    ) {
    }
}
