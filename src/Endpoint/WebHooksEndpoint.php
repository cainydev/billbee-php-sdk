<?php

/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - now by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\ClientInterface;
use BillbeeDe\BillbeeAPI\Exception\QuotaExceededException;
use BillbeeDe\BillbeeAPI\Model as Model;
use BillbeeDe\BillbeeAPI\Response as Response;
use Exception;
use InvalidArgumentException;
use JMS\Serializer\SerializerInterface;

class WebHooksEndpoint
{
    /** @var ClientInterface */
    private ClientInterface $client;

    /** @var SerializerInterface */
    private SerializerInterface $serializer;

    public function __construct(ClientInterface $client, SerializerInterface $serializer)
    {
        $this->client = $client;
        $this->serializer = $serializer;
    }

    /**
     * Get a list of all registered web hooks
     *
     * @return Model\WebHook[] The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     */
    public function getWebHooks(): array
    {
        return $this->client->get(
            'webhooks',
            [],
            sprintf('array<%s>', Model\WebHook::class)
        );
    }

    /**
     * Get a web hook by id
     *
     * @param string $id The id of the web hook
     * @return Model\WebHook The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     */
    public function getWebHook(string $id): Model\WebHook
    {
        return $this->client->get(
            'webhooks/' . $id,
            [],
            Model\WebHook::class
        );
    }

    /**
     * Get a list of all available filters
     *
     * @return array|null The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     */
    public function getWebHookFilters(): ?array
    {
        return $this->client->get(
            'webhooks/filters',
            [],
            sprintf('array<%s>', Model\WebHookFilter::class)
        );
    }

    /**
     * Creates a new web hook
     *
     * @param Model\WebHook $webHook The web hook which should be created
     * @return Model\WebHook The created web hook
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     */
    public function createWebHook(Model\WebHook $webHook): Model\WebHook
    {
        return $this->client->post(
            'webhooks',
            $this->serialize($webHook),
            Model\WebHook::class
        );
    }

    /**
     * @param mixed $data
     * @return string
     */
    private function serialize(mixed $data): string
    {
        return $this->serializer->serialize($data, 'json');
    }

    /**
     * Updates a web hook
     *
     * @param Model\WebHook $webHook The web hook
     * @return bool True if the web hook was updated
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidArgumentException If the web hook has no id
     * @throws Exception If the response cannot be parsed
     */
    public function updateWebHook(Model\WebHook $webHook): bool
    {
        if ($webHook->id === null) {
            throw new InvalidArgumentException('The id of the webHook cannot be empty');
        }

        $res = $this->client->put(
            'webhooks/' . $webHook->id,
            $this->serialize($webHook),
            Model\WebHook::class
        );

        return $res === null;
    }

    /**
     * Deletes all existing WebHook registrations.
     *
     * @return bool True if the web hooks was deleted
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     */
    public function deleteAllWebHooks(): bool
    {
        $res = $this->client->delete(
            'webhooks',
            [],
            Response\BaseResponse::class
        );
        return $res === null;
    }

    /**
     * Deletes an existing WebHook registration
     *
     * @param string $id The id of the web hook which should be deleted
     * @return bool True if the web hook was deleted
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidArgumentException If the web hook has no id
     * @throws Exception If the response cannot be parsed
     */
    public function deleteWebHookById(string $id): bool
    {
        $webHook = new Model\WebHook();
        $webHook->id = $id;
        return $this->deleteWebHook($webHook);
    }

    /**
     * Deletes an existing WebHook registration
     *
     * @param Model\WebHook $webHook The web hook which should be deleted
     * @return bool True if the web hook was deleted
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidArgumentException If the web hook has no id
     * @throws Exception If the response cannot be parsed
     */
    public function deleteWebHook(Model\WebHook $webHook): bool
    {
        if ($webHook->id === null) {
            throw new InvalidArgumentException('The id of the webHook cannot be empty');
        }

        $res = $this->client->delete(
            'webhooks/' . $webHook->id,
            [],
            Response\BaseResponse::class
        );
        return $res === null;
    }
}
