<?php

namespace BillbeeDe\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\ClientInterface;
use BillbeeDe\BillbeeAPI\Exception\ConnectionException;
use BillbeeDe\BillbeeAPI\Exception\QuotaExceededException;
use BillbeeDe\BillbeeAPI\Model\Product;
use BillbeeDe\BillbeeAPI\Model\Stock;
use BillbeeDe\BillbeeAPI\Model\StockCode;
use BillbeeDe\BillbeeAPI\Response\AcknowledgeResponse;
use BillbeeDe\BillbeeAPI\Response\GetProductsResponse;
use BillbeeDe\BillbeeAPI\Response\GetProductResponse;
use BillbeeDe\BillbeeAPI\Response\GetCategoriesResponse;
use BillbeeDe\BillbeeAPI\Response\GetPatchableFieldsResponse;
use BillbeeDe\BillbeeAPI\Response\UpdateStockResponse;
use BillbeeDe\BillbeeAPI\Response\UpdateStocksResponse;
use DateTimeInterface;
use BillbeeDe\BillbeeAPI\Type\ProductLookupBy;

readonly class ProductsEndpoint
{
    public function __construct(
        private ClientInterface $client,
    ) {
    }

    /**
     * @throws ConnectionException|QuotaExceededException
     */
    public function getProducts(int $page = 1, int $pageSize = 50, ?DateTimeInterface $minCreatedAt = null): GetProductsResponse
    {
        $query = [
            'page' => max(1, $page),
            'pageSize' => max(1, $pageSize),
        ];
        if ($minCreatedAt) {
            $query['minCreatedAt'] = $minCreatedAt->format('c');
        }
        return $this->client->get('products', GetProductsResponse::class, $query);
    }

    /**
     * @throws ConnectionException|QuotaExceededException
     */
    public function getProduct(int|string $productId, ProductLookupBy $lookupBy = ProductLookupBy::ID): GetProductResponse
    {
        return $this->client->get(
            "products/$productId",
            GetProductResponse::class,
            ['lookupBy' => $lookupBy],
        );
    }

    /**
     * @throws ConnectionException|QuotaExceededException
     */
    public function getCategories(): GetCategoriesResponse
    {
        return $this->client->get('products/category', GetCategoriesResponse::class);
    }

    /**
     * @throws ConnectionException|QuotaExceededException
     */
    public function getPatchableProductFields(): GetPatchableFieldsResponse
    {
        return $this->client->get('products/PatchableFields', GetPatchableFieldsResponse::class);
    }

    /**
     * @throws ConnectionException|QuotaExceededException
     */
    public function updateStock(Stock $stockModel): UpdateStockResponse
    {
        return $this->client->post('products/updatestock', UpdateStockResponse::class, $stockModel);
    }

    /**
     * @param array<int, Stock> $stockModels
     * @throws ConnectionException|QuotaExceededException
     */
    public function updateStockMultiple(array $stockModels): UpdateStocksResponse
    {
        return $this->client->post(
            'products/updatestockmultiple',
            UpdateStocksResponse::class,
            $stockModels,
        );
    }

    /**
     * @throws ConnectionException|QuotaExceededException
     */
    public function updateStockCode(StockCode $stockCodeModel): ?UpdateStockResponse
    {
        $json = $this->client->getSerializer()->serialize($stockCodeModel, 'json');
        return $this->client->post('products/updatestockcode', UpdateStockResponse::class, $json);
    }

    /**
     * @throws ConnectionException|QuotaExceededException
     */
    public function createProduct(Product $product): GetProductResponse
    {
        $json = $this->client->getSerializer()->serialize($product, 'json');
        return $this->client->post('products', GetProductResponse::class, $json);
    }

    /**
     * @param array<string, mixed> $fields
     * @throws ConnectionException|QuotaExceededException
     */
    public function patchProduct(int $productId, array $fields): ?GetProductResponse
    {
        return $this->client->patch("products/$productId", GetProductResponse::class, $fields);
    }

    /**
     * @throws ConnectionException|QuotaExceededException
     */
    public function deleteProduct(int $productId): void
    {
        $this->client->delete("products/$productId", AcknowledgeResponse::class);
    }
}