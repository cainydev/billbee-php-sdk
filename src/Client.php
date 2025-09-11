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
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\ClientException;

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

    private BatchClient $batchClient;
    private ?SerializerInterface $serializer;

    public function __construct(
        private ClientConfiguration $config,
    ) {
        $this->httpClient = new HttpClient($config, $this->getSerializer());

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

        $this->batchClient = new BatchClient($this);
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
     * @throws QuotaExceededException|InvalidIdException|ConnectionException|Exception
     */
    public function get(string $endpoint, array $query = [], ?string $responseClass = null): mixed
    {
        try {
            return $this->httpClient->get($endpoint, $query, $responseClass);
        } catch (ClientException $e) {
            if ($e->getCode() === 429) {
                throw new QuotaExceededException('API rate limit exceeded', 429, $e);
            }
            if ($e->getCode() === 404) {
                throw new InvalidIdException('Invalid resource ID', 404, $e);
            }
            throw new ConnectionException($e->getMessage(), $e->getCode(), $e);
        } catch (GuzzleException $e) {
            throw new ConnectionException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * @throws QuotaExceededException|InvalidIdException|ConnectionException|Exception
     */
    public function post(string $endpoint, mixed $data = null, ?string $responseClass = null): mixed
    {
        try {
            return $this->httpClient->post($endpoint, $data, $responseClass);
        } catch (ClientException $e) {
            if ($e->getCode() === 429) {
                throw new QuotaExceededException('API rate limit exceeded', 429, $e);
            }
            if ($e->getCode() === 404) {
                throw new InvalidIdException('Invalid resource ID', 404, $e);
            }
            throw new ConnectionException($e->getMessage(), $e->getCode(), $e);
        } catch (GuzzleException $e) {
            throw new ConnectionException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * @throws QuotaExceededException|InvalidIdException|ConnectionException|Exception
     */
    public function put(string $endpoint, mixed $data = null, ?string $responseClass = null): mixed
    {
        try {
            return $this->httpClient->put($endpoint, $data, $responseClass);
        } catch (ClientException $e) {
            if ($e->getCode() === 429) {
                throw new QuotaExceededException('API rate limit exceeded', 429, $e);
            }
            if ($e->getCode() === 404) {
                throw new InvalidIdException('Invalid resource ID', 404, $e);
            }
            throw new ConnectionException($e->getMessage(), $e->getCode(), $e);
        } catch (GuzzleException $e) {
            throw new ConnectionException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * @throws QuotaExceededException|InvalidIdException|ConnectionException|Exception
     */
    public function patch(string $endpoint, mixed $data = null, ?string $responseClass = null): mixed
    {
        try {
            return $this->httpClient->patch($endpoint, $data, $responseClass);
        } catch (ClientException $e) {
            if ($e->getCode() === 429) {
                throw new QuotaExceededException('API rate limit exceeded', 429, $e);
            }
            if ($e->getCode() === 404) {
                throw new InvalidIdException('Invalid resource ID', 404, $e);
            }
            throw new ConnectionException($e->getMessage(), $e->getCode(), $e);
        } catch (GuzzleException $e) {
            throw new ConnectionException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * @throws QuotaExceededException|InvalidIdException|ConnectionException|Exception
     */
    public function delete(string $endpoint, array $query = [], ?string $responseClass = null): mixed
    {
        try {
            return $this->httpClient->delete($endpoint, $query, $responseClass);
        } catch (ClientException $e) {
            if ($e->getCode() === 429) {
                throw new QuotaExceededException('API rate limit exceeded', 429, $e);
            }
            if ($e->getCode() === 404) {
                throw new InvalidIdException('Invalid resource ID', 404, $e);
            }
            throw new ConnectionException($e->getMessage(), $e->getCode(), $e);
        } catch (GuzzleException $e) {
            throw new ConnectionException($e->getMessage(), $e->getCode(), $e);
        }
    }

    public function getConfig(): ClientConfiguration
    {
        return $this->config;
    }

    public function getSerializer(): SerializerInterface
    {
        return $this->serializer ??= SerializerFactory::create();
    }

    public function getLogger(): LoggerInterface
    {
        return $this->config->logger;
    }

    public function batch(): BatchClient
    {
        return $this->batchClient;
    }
}
