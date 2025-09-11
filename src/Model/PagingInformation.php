<?php

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation;

final class PagingInformation
{
    public function __construct(
        #[Annotation\Type("int")]
        #[Annotation\SerializedName("Page")]
        public int $page = 0,

        #[Annotation\Type("int")]
        #[Annotation\SerializedName("TotalPages")]
        public int $totalPages = 0,

        #[Annotation\Type("int")]
        #[Annotation\SerializedName("TotalRows")]
        public int $totalRows = 0,

        #[Annotation\Type("int")]
        #[Annotation\SerializedName("PageSize")]
        public int $pageSize = 0,
    ) {
    }
}
