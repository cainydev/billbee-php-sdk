<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI;

use BillbeeDe\BillbeeAPI\Exception\QuotaExceededException;
use Exception;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use JMS\Serializer\SerializerInterface;
use Psr\Http\Message\ResponseInterface;

final class HttpClient
{
    private GuzzleClient $client;

    public function __construct(
        private readonly ClientConfiguration $config,
        private readonly SerializerInterface $serializer,
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
     * @param class-string|null $responseClass
     * @throws Exception
     * @throws GuzzleException
     */
    public function get(string $endpoint, array $query = [], ?string $responseClass = null): mixed
    {
        $response = $this->request('GET', $endpoint, [
            RequestOptions::QUERY => $query,
        ]);

        return $this->deserializeResponse($response, $responseClass);
    }

    /**
     * @param class-string|null $responseClass
     * @throws Exception
     * @throws GuzzleException
     */
    public function post(string $endpoint, mixed $data = null, ?string $responseClass = null): mixed
    {
        $options = [];
        if ($data !== null) {
            if (is_string($data)) {
                $options[RequestOptions::BODY] = $data;
            } else {
                $options[RequestOptions::JSON] = $data;
            }
        }

        $response = $this->request('POST', $endpoint, $options);
        return $this->deserializeResponse($response, $responseClass);
    }

    /**
     * @param class-string|null $responseClass
     * @throws Exception
     * @throws GuzzleException
     */
    public function put(string $endpoint, mixed $data = null, ?string $responseClass = null): mixed
    {
        $options = [];
        if ($data !== null) {
            if (is_string($data)) {
                $options[RequestOptions::BODY] = $data;
            } else {
                $options[RequestOptions::JSON] = $data;
            }
        }

        $response = $this->request('PUT', $endpoint, $options);
        return $this->deserializeResponse($response, $responseClass);
    }

    /**
     * @param class-string|null $responseClass
     * @throws Exception
     * @throws GuzzleException
     */
    public function patch(string $endpoint, mixed $data = null, ?string $responseClass = null): mixed
    {
        $options = [];
        if ($data !== null) {
            if (is_string($data)) {
                $options[RequestOptions::BODY] = $data;
            } else {
                $options[RequestOptions::JSON] = $data;
            }
        }

        $response = $this->request('PATCH', $endpoint, $options);
        return $this->deserializeResponse($response, $responseClass);
    }

    /**
     * @param array<string, mixed> $query
     * @param class-string|null $responseClass
     * @throws Exception|GuzzleException
     */
    public function delete(string $endpoint, array $query = [], ?string $responseClass = null): mixed
    {
        $response = $this->request('DELETE', $endpoint, [
            RequestOptions::QUERY => $query,
        ]);

        return $this->deserializeResponse($response, $responseClass);
    }

    /**
     * @param array<string, mixed> $options
     * @throws QuotaExceededException
     * @throws GuzzleException
     */
    private function request(string $method, string $endpoint, array $options = []): ResponseInterface
    {
        try {
            if ($this->config->enableRequestLogging) {
                $this->config->logger->debug("Making {$method} request to {$endpoint}", [
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

        } catch (GuzzleException $e) {
            if ($e->getCode() === 429) {
                $this->config->logger->warning('Request quota exceeded');
                throw new QuotaExceededException('API rate limit exceeded', 0, $e);
            }

            $this->config->logger->error('HTTP request failed', [
                'method' => $method,
                'endpoint' => $endpoint,
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ]);

            throw $e;
        }
    }

    /**
     * @param class-string|null $responseClass
     * @throws Exception
     */
    private function deserializeResponse(ResponseInterface $response, ?string $responseClass): mixed
    {
        $content = $response->getBody()->getContents();

        if ($responseClass === null || trim($content) === '') {
            return $content;
        }

        try {
            return $this->serializer->deserialize($content, $responseClass, 'json');
        } catch (\Exception $e) {
            $this->config->logger->error('Failed to deserialize response', [
                'responseClass' => $responseClass,
                'content' => $content,
                'error' => $e->getMessage(),
            ]);
            throw $e;
        }
    }
}
