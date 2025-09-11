<?php

namespace BillbeeDe\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\ClientInterface;
use BillbeeDe\BillbeeAPI\Exception\ConnectionException;
use BillbeeDe\BillbeeAPI\Exception\QuotaExceededException;
use BillbeeDe\BillbeeAPI\Model\WebHook;
use BillbeeDe\BillbeeAPI\Model\WebHookFilter;
use BillbeeDe\BillbeeAPI\Response\AcknowledgeResponse;
use InvalidArgumentException;

readonly class WebHooksEndpoint
{
    public function __construct(private ClientInterface $client)
    {
    }
    public function getWebHooks(): array
    {
        return $this->client->get('webhooks', [], sprintf('array<%s>', WebHook::class));
    }

    public function getWebHook(string $id): WebHook
    {
        return $this->client->get("webhooks/$id", [], WebHook::class);
    }

    public function getWebHookFilters(): ?array
    {
        return $this->client->get(
            'webhooks/filters',
            [],
            sprintf('array<%s>', WebHookFilter::class),
        );
    }

    public function createWebHook(WebHook $webHook): WebHook
    {
        $json = $this->client->getSerializer()->serialize($webHook, 'json');
        return $this->client->post('webhooks', $json, WebHook::class);
    }

    public function updateWebHook(WebHook $webHook): bool
    {
        if ($webHook->id === null) {
            throw new InvalidArgumentException('The id of the webHook cannot be empty');
        }
        $json = $this->client->getSerializer()->serialize($webHook, 'json');
        $res = $this->client->put("webhooks/$webHook->id", $json, WebHook::class);
        return $res === null;
    }

    public function deleteAllWebHooks(): bool
    {
        $res = $this->client->delete('webhooks', [], AcknowledgeResponse::class);
        return $res === null;
    }

    public function deleteWebHookById(string $id): bool
    {
        $webHook = new WebHook($id, null, null, null);
        $webHook->id = $id;
        return $this->deleteWebHook($webHook);
    }

    public function deleteWebHook(WebHook $webHook): bool
    {
        if ($webHook->id === null) {
            throw new InvalidArgumentException('The id of the webHook cannot be empty');
        }
        $res = $this->client->delete("webhooks/$webHook->id", [], AcknowledgeResponse::class);
        return $res === null;
    }
}
