<?php

namespace BillbeeDe\Tests\BillbeeAPI;

use Psr\Log\AbstractLogger;

class EchoLogger extends AbstractLogger
{
    public function log($level, $message, array $context = []): void
    {
        echo sprintf('[%s] %s: %s' . PHP_EOL, date('Y-m-d H:i:s'), strtoupper((string)$level), (string)$message);
        if (!empty($context)) {
            print_r($context);
            echo PHP_EOL;
        }
    }
}
