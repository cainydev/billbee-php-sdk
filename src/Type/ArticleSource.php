<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Type;

enum ArticleSource: int
{
    case ORDER_POSITION = 0;
    case ARTICLE_TITLE = 1;
    case ARTICLE_INVOICE_TEXT = 2;
}
