<?php

namespace BillbeeDe\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\ClientInterface;
use BillbeeDe\BillbeeAPI\Exception\ConnectionException;
use BillbeeDe\BillbeeAPI\Exception\InvalidIdException;
use BillbeeDe\BillbeeAPI\Exception\QuotaExceededException;
use BillbeeDe\BillbeeAPI\Model\WebHook;
use BillbeeDe\BillbeeAPI\Model\WebHookFilter;
use BillbeeDe\BillbeeAPI\Response\AcknowledgeResponse;
use Exception;
use InvalidArgumentException;

readonly class WebHooksEndpoint
{
    public function __construct(
        private ClientInterface $client,
    ) {
    }

    /**
     * @return WebHook[]
     * @throws QuotaExceededException|ConnectionException|Exception
     */
    public function getWebHooks(): array
    {
        return $this->client->getArray('webhooks', WebHook::class, []);
    }

    /**
     * @throws QuotaExceededException|ConnectionException|Exception
     */
    public function getWebHook(string $id): WebHook
    {
        return $this->client->get("webhooks/$id", WebHook::class);
    }

    /**
     * @return WebHookFilter[]|null
     * @throws QuotaExceededException|ConnectionException|Exception
     */
    public function getWebHookFilters(): ?array
    {
        return $this->client->getArray('webhooks/filters', WebHookFilter::class, []);
    }

    /**
     * @throws QuotaExceededException|ConnectionException|Exception
     */
    public function createWebHook(WebHook $webHook): WebHook
    {
        $json = $this->client->getSerializer()->serialize($webHook, 'json');
        return $this->client->post('webhooks', WebHook::class, $json);
    }

    /**
     * @throws QuotaExceededException|InvalidIdException|ConnectionException|Exception
     */
    public function updateWebHook(WebHook $webHook): bool
    {
        if ($webHook->id === null) {
            throw new InvalidArgumentException('The id of the webHook cannot be empty');
        }
        $json = $this->client->getSerializer()->serialize($webHook, 'json');
        $this->client->put("webhooks/$webHook->id", WebHook::class, $json);
        return true;
    }

    /**
     * @throws QuotaExceededException|ConnectionException|Exception
     */
    public function deleteAllWebHooks(): bool
    {
        $res = $this->client->delete('webhooks', AcknowledgeResponse::class);
        return $res->errorCode === 0;
    }

    /**
     * @throws QuotaExceededException|InvalidIdException|ConnectionException|Exception
     */
    public function deleteWebHookById(string $id): bool
    {
        $webHook = new WebHook($id, null, null, null);
        $webHook->id = $id;
        return $this->deleteWebHook($webHook);
    }

    /**
     * @throws QuotaExceededException|InvalidIdException|ConnectionException|Exception
     */
    public function deleteWebHook(WebHook $webHook): bool
    {
        if ($webHook->id === null) {
            throw new InvalidIdException('The id of the webHook cannot be empty');
        }
        $res = $this->client->delete("webhooks/$webHook->id", AcknowledgeResponse::class);
        return $res->errorCode === 0;
    }
}