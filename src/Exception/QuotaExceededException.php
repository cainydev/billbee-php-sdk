<?php

namespace BillbeeDe\BillbeeAPI\Exception;

use Exception;
use Throwable;

class QuotaExceededException extends Exception
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
