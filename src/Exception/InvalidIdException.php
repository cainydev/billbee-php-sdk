<?php

namespace BillbeeDe\BillbeeAPI\Exception;

use InvalidArgumentException;
use Throwable;

class InvalidIdException extends InvalidArgumentException
{
    public function __construct(string $message = "Invalid resource ID. Must be a positive integer.", int $code = 404, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
