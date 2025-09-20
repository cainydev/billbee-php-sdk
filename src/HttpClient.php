<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI;

use BillbeeDe\BillbeeAPI\Exception\QuotaExceededException;
use BillbeeDe\BillbeeAPI\Exception\ConnectionException;
use BillbeeDe\BillbeeAPI\Exception\InvalidIdException;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use Exception;

final class HttpClient
{
    private GuzzleClient $client;

    public function __construct(
        private readonly ClientConfiguration $config,
    ) {
        $this->client = new GuzzleClient([
            'base_uri' => $config->baseUrl,
            'auth' => [$config->username, $config->apiPassword],
            'headers' => [
                'X-Billbee-Api-Key' => $config->apiKey,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'verify' => $config->verifySSL,
            'timeout' => $config->timeout,
        ]);
    }

    /**
     * @param array<string, mixed> $query
     * @throws QuotaExceededException|InvalidIdException|ConnectionException
     */
    public function get(string $endpoint, array $query = []): ResponseInterface
    {
        return $this->request('GET', $endpoint, [
            RequestOptions::QUERY => $query,
        ]);
    }

    /**
     * @throws QuotaExceededException|InvalidIdException|ConnectionException
     */
    public function post(string $endpoint, mixed $data = null): ResponseInterface
    {
        $options = [];
        if ($data !== null) {
            if (is_string($data)) {
                $options[RequestOptions::BODY] = $data;
            } else {
                $options[RequestOptions::JSON] = $data;
            }
        }

        return $this->request('POST', $endpoint, $options);
    }

    /**
     * @throws QuotaExceededException|InvalidIdException|ConnectionException
     */
    public function put(string $endpoint, mixed $data = null): ResponseInterface
    {
        $options = [];
        if ($data !== null) {
            if (is_string($data)) {
                $options[RequestOptions::BODY] = $data;
            } else {
                $options[RequestOptions::JSON] = $data;
            }
        }

        return $this->request('PUT', $endpoint, $options);
    }

    /**
     * @throws QuotaExceededException|InvalidIdException|ConnectionException
     */
    public function patch(string $endpoint, mixed $data = null): ResponseInterface
    {
        $options = [];
        if ($data !== null) {
            if (is_string($data)) {
                $options[RequestOptions::BODY] = $data;
            } else {
                $options[RequestOptions::JSON] = $data;
            }
        }

        return $this->request('PATCH', $endpoint, $options);
    }

    /**
     * @param array<string, mixed> $query
     * @throws QuotaExceededException|InvalidIdException|ConnectionException
     */
    public function delete(string $endpoint, array $query = []): ResponseInterface
    {
        return $this->request('DELETE', $endpoint, [
            RequestOptions::QUERY => $query,
        ]);
    }

    /**
     * @param array<string, mixed> $options
     * @throws QuotaExceededException|InvalidIdException|ConnectionException
     */
    private function request(string $method, string $endpoint, array $options = []): ResponseInterface
    {
        try {
            if ($this->config->enableRequestLogging) {
                $this->config->logger->debug("Making $method request to $endpoint", [
                    'options' => $options,
                ]);
            }

            $response = $this->client->request($method, $endpoint, $options);

            if ($this->config->enableRequestLogging) {
                $this->config->logger->debug("Request successful", [
                    'status' => $response->getStatusCode(),
                    'headers' => $response->getHeaders(),
                ]);
            }

            return $response;

        } catch (ClientException $e) {
            $code = $e->getCode();
            if ($code === 429) {
                $this->config->logger->warning('Request quota exceeded');
                throw new QuotaExceededException('API rate limit exceeded', 429, $e);
            }
            if ($code === 404) {
                $this->config->logger->warning('Invalid resource ID');
                throw new InvalidIdException('Invalid resource ID', 404, $e);
            }
            $this->config->logger->error('HTTP client error', [
                'method' => $method,
                'endpoint' => $endpoint,
                'error' => $e->getMessage(),
                'code' => $code,
            ]);
            throw new ConnectionException($e->getMessage(), $code, $e);
        } catch (GuzzleException $e) {
            $this->config->logger->error('HTTP request failed', [
                'method' => $method,
                'endpoint' => $endpoint,
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ]);
            throw new ConnectionException($e->getMessage(), $e->getCode(), $e);
        } catch (Exception $e) {
            $this->config->logger->error('Unexpected error during HTTP request', [
                'method' => $method,
                'endpoint' => $endpoint,
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ]);
            throw new ConnectionException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
