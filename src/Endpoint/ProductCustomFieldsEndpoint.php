<?php

namespace BillbeeDe\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\ClientInterface;
use BillbeeDe\BillbeeAPI\Exception\ConnectionException;
use BillbeeDe\BillbeeAPI\Exception\InvalidIdException;
use BillbeeDe\BillbeeAPI\Exception\QuotaExceededException;
use BillbeeDe\BillbeeAPI\Response\GetCustomFieldDefinitionsResponse;
use BillbeeDe\BillbeeAPI\Response\GetCustomFieldDefinitionResponse;

readonly class ProductCustomFieldsEndpoint
{
    public function __construct(private ClientInterface $client)
    {
    }

    /**
     * @throws ConnectionException|QuotaExceededException
     */
    public function getCustomFieldDefinitions(int $page = 1, int $pageSize = 50): GetCustomFieldDefinitionsResponse
    {
        $query = [
            'page' => max(1, $page),
            'pageSize' => max(1, $pageSize),
        ];

        return $this->client->get(
            'products/custom-fields',
            $query,
            GetCustomFieldDefinitionsResponse::class,
        );
    }

    /**
     * @throws ConnectionException|QuotaExceededException
     */
    public function getCustomFieldDefinition(int $id): GetCustomFieldDefinitionResponse
    {
        if ($id < 1) {
            throw new InvalidIdException();
        }

        return $this->client->get(
            "products/custom-fields/$id",
            [],
            GetCustomFieldDefinitionResponse::class,
        );
    }
}
