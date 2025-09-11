<?php

namespace BillbeeDe\Tests\BillbeeAPI;

use BillbeeDe\BillbeeAPI\Client;
use BillbeeDe\BillbeeAPI\ClientConfiguration;
use BillbeeDe\BillbeeAPI\Transformer\AsIsTransformer;
use BillbeeDe\BillbeeAPI\Transformer\DefinitionConfigTransformer;
use BillbeeDe\BillbeeAPI\Transformer\NativeDateTimeHandler;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\Visitor\Factory\JsonSerializationVisitorFactory;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    private ?Client $client = null;

    protected function setUp(): void
    {
        $serializer = SerializerBuilder::create()
            ->addDefaultDeserializationVisitors()
            ->addDefaultSerializationVisitors()
            ->addDefaultHandlers()
            ->addDefaultListeners()
            ->setSerializationVisitor(
                'json',
                (new JsonSerializationVisitorFactory())->setOptions(JSON_PRESERVE_ZERO_FRACTION | JSON_PRETTY_PRINT)
            )
            ->configureHandlers(
                function (HandlerRegistry $registry): void {
                    $registry->registerSubscribingHandler(new DefinitionConfigTransformer());
                    $registry->registerSubscribingHandler(new AsIsTransformer());
                    $registry->registerSubscribingHandler(new NativeDateTimeHandler());
                }
            )->build();

        if ($this->client === null) {
            $config = new ClientConfiguration(
                username: 'World',
                apiPassword: '12344',
                apiKey: 'Hello'
            );

            $this->client = new Client($config, $serializer);
        }
    }

    public function testConstruct(): void
    {
        $this->assertInstanceOf(Client::class, $this->client);
    }
}
