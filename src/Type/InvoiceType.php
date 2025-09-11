<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Type;

enum InvoiceType: string
{
    case INVOICE = 'invoice';
    case CREDIT = 'creditnote';
}
