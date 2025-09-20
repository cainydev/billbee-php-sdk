<?php

namespace BillbeeDe\BillbeeAPI\Exception;

use Exception;
use Throwable;

class ConnectionException extends Exception
{
    public function __construct(string $message = "Connection error", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
