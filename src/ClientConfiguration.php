<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI;

use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

final readonly class ClientConfiguration
{
    public function __construct(
        public string $username,
        public string $apiPassword,
        public string $apiKey,
        public string $baseUrl = 'https://api.billbee.io/api/v1/',
        public LoggerInterface $logger = new NullLogger(),
        public string $dateTimeClass = \DateTime::class,
        public bool $enableRequestLogging = false,
        public bool $verifySSL = true,
        public float $timeout = 30.0,
    ) {
        if (!is_subclass_of($this->dateTimeClass, \DateTimeInterface::class)) {
            throw new \InvalidArgumentException(
                "DateTime class must implement DateTimeInterface, got: {$this->dateTimeClass}"
            );
        }
    }

    public static function create(
        string $username,
        string $apiPassword,
        string $apiKey,
    ): self {
        return new self($username, $apiPassword, $apiKey);
    }

    /**
     * Set a custom logger instance.
     *
     * @param LoggerInterface $logger
     * @return self
     */
    public function withLogger(LoggerInterface $logger): self
    {
        return new self(
            username: $this->username,
            apiPassword: $this->apiPassword,
            apiKey: $this->apiKey,
            baseUrl: $this->baseUrl,
            logger: $logger,
            dateTimeClass: $this->dateTimeClass,
            enableRequestLogging: $this->enableRequestLogging,
            verifySSL: $this->verifySSL,
            timeout: $this->timeout,
        );
    }

    /**
     * Set a custom DateTime class.
     *
     * @param string $dateTimeClass
     * @return self
     */
    public function withDateTimeClass(string $dateTimeClass): self
    {
        if (!is_subclass_of($dateTimeClass, \DateTimeInterface::class)) {
            throw new \InvalidArgumentException(
                "DateTime class must implement DateTimeInterface, got: {$dateTimeClass}"
            );
        }

        return new self(
            username: $this->username,
            apiPassword: $this->apiPassword,
            apiKey: $this->apiKey,
            baseUrl: $this->baseUrl,
            logger: $this->logger,
            dateTimeClass: $dateTimeClass,
            enableRequestLogging: $this->enableRequestLogging,
            verifySSL: $this->verifySSL,
            timeout: $this->timeout,
        );
    }

    /**
     * @param bool $enabled
     * @return self
     */
    public function withRequestLogging(bool $enabled = true): self
    {
        return new self(
            username: $this->username,
            apiPassword: $this->apiPassword,
            apiKey: $this->apiKey,
            baseUrl: $this->baseUrl,
            logger: $this->logger,
            dateTimeClass: $this->dateTimeClass,
            enableRequestLogging: $enabled,
            verifySSL: $this->verifySSL,
            timeout: $this->timeout,
        );
    }
}
