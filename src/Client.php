<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI;

use BillbeeDe\BillbeeAPI\Endpoint\CloudStorageEndpoint;
use BillbeeDe\BillbeeAPI\Endpoint\CustomersEndpoint;
use BillbeeDe\BillbeeAPI\Endpoint\EventsEndpoint;
use BillbeeDe\BillbeeAPI\Endpoint\InvoiceEndpoint;
use BillbeeDe\BillbeeAPI\Endpoint\LayoutsEndpoint;
use BillbeeDe\BillbeeAPI\Endpoint\OrdersEndpoint;
use BillbeeDe\BillbeeAPI\Endpoint\ProductCustomFieldsEndpoint;
use BillbeeDe\BillbeeAPI\Endpoint\ProductsEndpoint;
use BillbeeDe\BillbeeAPI\Endpoint\ProvisioningEndpoint;
use BillbeeDe\BillbeeAPI\Endpoint\SearchEndpoint;
use BillbeeDe\BillbeeAPI\Endpoint\ShipmentsEndpoint;
use BillbeeDe\BillbeeAPI\Endpoint\WebHooksEndpoint;
use BillbeeDe\BillbeeAPI\Exception\QuotaExceededException;
use BillbeeDe\BillbeeAPI\Exception\InvalidIdException;
use BillbeeDe\BillbeeAPI\Exception\ConnectionException;
use Exception;
use JMS\Serializer\SerializerInterface;
use Psr\Log\LoggerInterface;
use Psr\Http\Message\ResponseInterface;
use T;

final readonly class Client implements ClientInterface
{
    private HttpClient $httpClient;

    private ProductsEndpoint $productsEndpoint;
    private ProvisioningEndpoint $provisioningEndpoint;
    private EventsEndpoint $eventsEndpoint;
    private OrdersEndpoint $ordersEndpoint;
    private InvoiceEndpoint $invoicesEndpoint;
    private ShipmentsEndpoint $shipmentsEndpoint;
    private ProductCustomFieldsEndpoint $customFieldsEndpoint;
    private WebHooksEndpoint $webHooksEndpoint;
    private CustomersEndpoint $customersEndpoint;
    private CloudStorageEndpoint $cloudStoragesEndpoint;
    private LayoutsEndpoint $layoutsEndpoint;
    private SearchEndpoint $searchEndpoint;

    private SerializerInterface $serializer;

    public function __construct(
        private ClientConfiguration $config,
    ) {
        $this->serializer = SerializerFactory::create();
        $this->httpClient = new HttpClient($config);

        $this->productsEndpoint = new ProductsEndpoint($this);
        $this->provisioningEndpoint = new ProvisioningEndpoint($this);
        $this->eventsEndpoint = new EventsEndpoint($this);
        $this->ordersEndpoint = new OrdersEndpoint($this);
        $this->invoicesEndpoint = new InvoiceEndpoint($this);
        $this->shipmentsEndpoint = new ShipmentsEndpoint($this);
        $this->customFieldsEndpoint = new ProductCustomFieldsEndpoint($this);
        $this->webHooksEndpoint = new WebHooksEndpoint($this);
        $this->customersEndpoint = new CustomersEndpoint($this);
        $this->cloudStoragesEndpoint = new CloudStorageEndpoint($this);
        $this->layoutsEndpoint = new LayoutsEndpoint($this);
        $this->searchEndpoint = new SearchEndpoint($this);
    }

    public function products(): ProductsEndpoint
    {
        return $this->productsEndpoint;
    }

    public function provisioning(): ProvisioningEndpoint
    {
        return $this->provisioningEndpoint;
    }

    public function events(): EventsEndpoint
    {
        return $this->eventsEndpoint;
    }

    public function orders(): OrdersEndpoint
    {
        return $this->ordersEndpoint;
    }

    public function invoices(): InvoiceEndpoint
    {
        return $this->invoicesEndpoint;
    }

    public function shipments(): ShipmentsEndpoint
    {
        return $this->shipmentsEndpoint;
    }

    public function productCustomFields(): ProductCustomFieldsEndpoint
    {
        return $this->customFieldsEndpoint;
    }

    public function webHooks(): WebHooksEndpoint
    {
        return $this->webHooksEndpoint;
    }

    public function customers(): CustomersEndpoint
    {
        return $this->customersEndpoint;
    }

    public function cloudStorages(): CloudStorageEndpoint
    {
        return $this->cloudStoragesEndpoint;
    }

    public function layouts(): LayoutsEndpoint
    {
        return $this->layoutsEndpoint;
    }

    public function search(): SearchEndpoint
    {
        return $this->searchEndpoint;
    }

    /**
     * @template T
     * @param class-string<T> $responseClass
     * @param array<string, mixed> $query
     * @return T
     * @throws QuotaExceededException|InvalidIdException|ConnectionException
     */
    public function get(string $endpoint, string $responseClass, array $query = []): mixed
    {
        $response = $this->httpClient->get($endpoint, $query);
        return $this->deserializeResponse($response, $responseClass);
    }

    /**
     * @template T
     * @param class-string<T> $responseClass
     * @param array<string, mixed> $query
     * @return array<T>
     * @throws QuotaExceededException|InvalidIdException|ConnectionException
     */
    public function getArray(string $endpoint, string $responseClass, array $query = []): array
    {
        $response = $this->httpClient->get($endpoint, $query);

        /** @var class-string<mixed> $arrayResponseClass */
        $arrayResponseClass = sprintf('array<%s>', $responseClass);

        $result = $this->deserializeResponse($response, $arrayResponseClass);
        return is_array($result) ? $result : [];
    }

    /**
     * @template T
     * @param class-string<T> $responseClass
     * @return T
     * @throws ConnectionException
     * @throws QuotaExceededException
     */
    public function post(string $endpoint, string $responseClass, mixed $data = null): mixed
    {
        $response = $this->httpClient->post($endpoint, $data);
        return $this->deserializeResponse($response, $responseClass);
    }

    /**
     * @template T
     * @param class-string<T> $responseClass
     * @return T
     * @throws QuotaExceededException|InvalidIdException|ConnectionException
     */
    public function put(string $endpoint, string $responseClass, mixed $data = null): mixed
    {
        $response = $this->httpClient->put($endpoint, $data);
        return $this->deserializeResponse($response, $responseClass);
    }

    /**
     * @template T
     * @param class-string<T> $responseClass
     * @return T
     * @throws QuotaExceededException|InvalidIdException|ConnectionException
     */
    public function patch(string $endpoint, string $responseClass, mixed $data = null): mixed
    {
        $response = $this->httpClient->patch($endpoint, $data);
        return $this->deserializeResponse($response, $responseClass);
    }

    /**
     * @template T
     * @param class-string<T> $responseClass
     * @param array<string, mixed> $query
     * @return T
     * @throws QuotaExceededException|InvalidIdException|ConnectionException
     */
    public function delete(string $endpoint, string $responseClass, array $query = []): mixed
    {
        $response = $this->httpClient->delete($endpoint, $query);
        return $this->deserializeResponse($response, $responseClass);
    }

    /**
     * @template T
     * @param class-string<T> $responseClass
     * @return T
     * @throws ConnectionException
     */
    private function deserializeResponse(ResponseInterface $response, string $responseClass): mixed
    {
        $content = $response->getBody()->getContents();

        if (trim($content) === '') {
            // For array types, return empty array; for others, throw?
            if (str_starts_with($responseClass, 'array<')) {
                /** @var T $empty */
                $empty = [];
                return $empty;
            }
            throw new ConnectionException('Empty response body for class: ' . $responseClass);
        }

        try {
            /** @var T $result */
            $result = $this->serializer->deserialize($content, $responseClass, 'json');
            return $result;
        } catch (Exception $e) {
            $this->config->logger->error('Failed to deserialize response', [
                'responseClass' => $responseClass,
                'content' => $content,
                'error' => $e->getMessage(),
            ]);
            throw new ConnectionException('Failed to deserialize response: ' . $e->getMessage(), $e->getCode(), $e);
        }
    }

    public function getConfig(): ClientConfiguration
    {
        return $this->config;
    }

    public function getSerializer(): SerializerInterface
    {
        return $this->serializer;
    }

    public function getLogger(): LoggerInterface
    {
        return $this->config->logger;
    }
}
