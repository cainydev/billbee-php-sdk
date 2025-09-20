<?php

namespace BillbeeDe\Tests\BillbeeAPI;

use BillbeeDe\BillbeeAPI\Client;
use BillbeeDe\BillbeeAPI\ClientConfiguration;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    private ?Client $client = null;

    protected function setUp(): void
    {
        if ($this->client === null) {
            $config = new ClientConfiguration(
                username: 'World',
                apiPassword: '12344',
                apiKey: 'Hello'
            );

            $this->client = new Client($config);
        }
    }

    public function testConstruct(): void
    {
        $this->assertInstanceOf(Client::class, $this->client);
    }
}
