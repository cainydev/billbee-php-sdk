<?php

namespace BillbeeDe\Tests\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\Endpoint\ProductsEndpoint;
use BillbeeDe\BillbeeAPI\Model\Product;
use BillbeeDe\BillbeeAPI\Model\Stock;
use BillbeeDe\BillbeeAPI\Model\StockCode;
use BillbeeDe\BillbeeAPI\Response\AcknowledgeResponse;
use BillbeeDe\BillbeeAPI\Response\BaseResponse;
use BillbeeDe\BillbeeAPI\Response\GetCategoriesResponse;
use BillbeeDe\BillbeeAPI\Response\GetPatchableFieldsResponse;
use BillbeeDe\BillbeeAPI\Response\GetProductResponse;
use BillbeeDe\BillbeeAPI\Response\GetProductsResponse;
use BillbeeDe\BillbeeAPI\Response\UpdateStockResponse;
use BillbeeDe\BillbeeAPI\Response\UpdateStocksResponse;
use BillbeeDe\BillbeeAPI\Type\ProductLookupBy;
use BillbeeDe\Tests\BillbeeAPI\TestClient;
use DateTime;
use PHPUnit\Framework\TestCase;

class ProductsEndpointTest extends TestCase
{
    private ProductsEndpoint $endpoint;
    private TestClient $client;

    protected function setUp(): void
    {
        $this->client = new TestClient();
        $this->endpoint = new ProductsEndpoint($this->client);
    }

    public function testGetProducts(): void
    {
        $this->endpoint->getProducts(1, 1);
        $this->endpoint->getProducts(2, 10, new DateTime('2020-10-01T00:00:00'));

        $requests = $this->client->getRequests();
        $this->assertCount(2, $requests);

        [$method, $node, $query, $class] = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('products', $node);
        $this->assertSame(['page' => 1, 'pageSize' => 1], $query);
        $this->assertSame(GetProductsResponse::class, $class);

        [$method, $node, $query, $class] = $requests[1];
        $this->assertSame('GET', $method);
        $this->assertSame('products', $node);
        $this->assertSame([
            'page' => 2,
            'pageSize' => 10,
            'minCreatedAt' => '2020-10-01T00:00:00+00:00',
        ], $query);
        $this->assertSame(GetProductsResponse::class, $class);
    }

    public function testGetProduct(): void
    {
        $this->endpoint->getProduct(4711);
        $this->endpoint->getProduct(1234, ProductLookupBy::EAN);

        $requests = $this->client->getRequests();
        $this->assertCount(2, $requests);

        [$method, $node, $query, $class] = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('products/4711', $node);
        $this->assertSame(['lookupBy' => ProductLookupBy::ID], $query);
        $this->assertSame(GetProductResponse::class, $class);

        [$method, $node, $query, $class] = $requests[1];
        $this->assertSame('GET', $method);
        $this->assertSame('products/1234', $node);
        $this->assertSame(['lookupBy' => ProductLookupBy::EAN], $query);
        $this->assertSame(GetProductResponse::class, $class);
    }

    public function testGetCategories(): void
    {
        $this->endpoint->getCategories();
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $query, $class] = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('products/category', $node);
        $this->assertSame([], $query);
        $this->assertSame(GetCategoriesResponse::class, $class);
    }

    public function testGetPatchableProductFields(): void
    {
        $this->endpoint->getPatchableProductFields();
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $query, $class] = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('products/PatchableFields', $node);
        $this->assertSame([], $query);
        $this->assertSame(GetPatchableFieldsResponse::class, $class);
    }

    public function testUpdateStock(): void
    {
        $stockModel = new Stock('4711', 1234, '0');

        $this->endpoint->updateStock($stockModel);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('POST', $method);
        $this->assertSame('products/updatestock', $node);
        $this->assertSame($stockModel, $data);
        $this->assertSame(UpdateStockResponse::class, $class);
    }

    public function testUpdateStockMultiple(): void
    {
        $stockModel1 = new Stock('4711', 1234, '0');
        $stockModel2 = new Stock('1234', 500, '600');

        $this->endpoint->updateStockMultiple([$stockModel1, $stockModel2]);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('POST', $method);
        $this->assertSame('products/updatestockmultiple', $node);
        $this->assertSame([$stockModel1, $stockModel2], $data);
        $this->assertSame(UpdateStocksResponse::class, $class);
    }

    public function testUpdateStockCode(): void
    {
        $stockCode = new StockCode(
            sku: '1234',
            stockId: 1234,
            stockCode: '54321',
        );

        $this->endpoint->updateStockCode($stockCode);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('POST', $method);
        $this->assertSame('products/updatestockcode', $node);
        $this->assertSame(UpdateStockResponse::class, $class);
    }

    public function testCreateProduct(): void
    {
        $product = new Product();

        $this->endpoint->createProduct($product);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('POST', $method);
        $this->assertSame('products', $node);
        $this->assertSame(GetProductResponse::class, $class);
    }

    public function testPatchProduct(): void
    {
        $this->endpoint->patchProduct(1234, ['foo' => 'bar']);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('PATCH', $method);
        $this->assertSame('products/1234', $node);
        $this->assertSame(['foo' => 'bar'], $data);
        $this->assertSame(GetProductResponse::class, $class);
    }

    public function testDeleteProduct(): void
    {
        $this->endpoint->deleteProduct(1234);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('DELETE', $method);
        $this->assertSame('products/1234', $node);
        $this->assertSame([], $data);
        $this->assertSame(AcknowledgeResponse::class, $class);
    }
}
