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
use BillbeeDe\BillbeeAPI\Model\StockCode;
use BillbeeDe\BillbeeAPI\Response as Response;
use BillbeeDe\BillbeeAPI\Response\BaseResponse;
use BillbeeDe\BillbeeAPI\Response\GetProductResponse;
use BillbeeDe\BillbeeAPI\Type as Type;
use DateTime;
use Exception;
use JMS\Serializer\SerializerInterface;

class ProductsEndpoint
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
     * Get a list of all products optionally filtered by date
     *
     * @param int $page The start page
     * @param int $pageSize The page size
     * @param DateTime|null $minCreatedAt The date of creation of the products
     * @return Response\GetProductsResponse The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     */
    public function getProducts(int $page = 1, int $pageSize = 50, DateTime $minCreatedAt = null): Response\GetProductsResponse
    {
        $query = [
            'page' => max(1, $page),
            'pageSize' => max(1, $pageSize),
        ];

        if ($minCreatedAt instanceof DateTime) {
            $query['minCreatedAt'] = $minCreatedAt->format('c');
        }

        return $this->client->get(
            'products',
            $query,
            Response\GetProductsResponse::class
        );
    }

    /**
     * Get a single product by ID
     *
     * @param int|string $productId The product ID
     * @param string $lookupBy Either the value id, ean or the value sku to specify the meaning of the id parameter
     * @return Response\GetProductResponse The product response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     * @see \BillbeeDe\BillbeeAPI\Type\ProductLookupBy
     */
    public function getProduct(int|string $productId, string $lookupBy = Type\ProductLookupBy::ID): Response\GetProductResponse
    {
        return $this->client->get(
            'products/' . $productId,
            ['lookupBy' => $lookupBy],
            Response\GetProductResponse::class
        );
    }

    /**
     * Get a list of all defined categories
     *
     * @return Response\GetCategoriesResponse The category response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     */
    public function getCategories(): Response\GetCategoriesResponse
    {
        return $this->client->get(
            'products/category',
            [],
            Response\GetCategoriesResponse::class
        );
    }

    /**
     *
     * Returns a list of fields which can be updated with the patchProduct call
     *
     * @return Response\GetPatchableFieldsResponse
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     *
     * @see Client::patchProduct($productId, $model)
     */
    public function getPatchableProductFields(): Response\GetPatchableFieldsResponse
    {
        return $this->client->get(
            'products/PatchableFields',
            [],
            Response\GetPatchableFieldsResponse::class
        );
    }

    /**
     * Updates the stock for a single product
     *
     * @param Model\Stock $stockModel The stock model
     * @return Response\UpdateStockResponse The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     */
    public function updateStock(Model\Stock $stockModel): Response\UpdateStockResponse
    {
        return $this->client->post(
            'products/updatestock',
            $stockModel,
            Response\UpdateStockResponse::class
        );
    }

    /**
     * Updates the stock for multiple products
     *
     * @param Model\Stock[] $stockModels The stock models
     * @return Response\UpdateStockResponse[] The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     */
    public function updateStockMultiple(array $stockModels): array
    {
        return $this->client->post(
            'products/updatestockmultiple',
            $stockModels,
            sprintf('array<%s>', Response\UpdateStockResponse::class)
        );
    }

    /**
     * Updates the stock code for a single  products
     *
     * @param StockCode $stockCodeModel The stock code model
     * @return BaseResponse|null The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     */
    public function updateStockCode(Model\StockCode $stockCodeModel): ?Response\BaseResponse
    {
        return $this->client->post(
            'products/updatestockcode',
            $this->serialize($stockCodeModel),
            Response\BaseResponse::class
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
     * Creates a new product
     *
     * @param Model\Product $product
     * @return Response\GetProductResponse The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     */
    public function createProduct(Model\Product $product): Response\GetProductResponse
    {
        return $this->client->post(
            'products',
            $this->serialize($product),
            Response\GetProductResponse::class
        );
    }

    /**
     * Updates one or more fields of a product
     *
     * @param int $productId The internal id of the product
     * @param array<string, mixed> $model The fields to patch
     *
     * @return GetProductResponse|null The order
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @see Client::getPatchableProductFields()
     */
    public function patchProduct(int $productId, array $model): ?Response\GetProductResponse
    {
        return $this->client->patch(
            'products/' . $productId,
            $model,
            Response\GetProductResponse::class
        );
    }

    /**
     * Deletes a product by id
     *
     * @param int $productId The ID of the product
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     */
    public function deleteProduct(int $productId): void
    {
        $this->client->delete(
            'products/' . $productId,
            [],
            Response\BaseResponse::class
        );
    }
}
