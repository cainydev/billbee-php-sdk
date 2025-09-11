<?php

namespace BillbeeDe\Tests\BillbeeAPI;

use BillbeeDe\BillbeeAPI\Transformer\AsIsTransformer;
use BillbeeDe\BillbeeAPI\Transformer\DefinitionConfigTransformer;
use BillbeeDe\BillbeeAPI\Transformer\NativeDateTimeHandler;
use JMS\Serializer\Handler\EnumHandler;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\Visitor\Factory\JsonSerializationVisitorFactory;
use PHPUnit\Framework\TestCase;
use ReflectionMethod;

abstract class SerializerTestCase extends TestCase
{
    abstract public static function getFixturePath(): string;
    abstract public static function getExpectedObject(): mixed;

    public static function getTargetType(): string
    {
        $method = new ReflectionMethod(static::class, 'getExpectedObject');
        $type = $method->getReturnType();

        if ($type && !$type->isBuiltin()) {
            return $type->getName();
        }

        throw new \RuntimeException("Cannot infer target type: please override getTargetType in " . static::class);
    }

    public function testSerializeFixture(): void
    {
        $expectedFixture = trim(file_get_contents(__DIR__ . '/fixtures/' . static::getFixturePath()));
        $serialized = static::getSerializer()->serialize(static::getExpectedObject(), 'json');
        if ($serialized !== $expectedFixture) {
            echo $serialized;
        }
        self::assertEquals($expectedFixture, $serialized);
    }

    public function testDeserializeFixture(): void
    {
        $json = trim(file_get_contents(__DIR__ . '/fixtures/' . static::getFixturePath()));
        $deserialized = static::getSerializer()->deserialize($json, static::getTargetType(), 'json');
        self::assertEquals(static::getExpectedObject(), $deserialized);
    }

    private static function getSerializer(): Serializer
    {
        return SerializerBuilder::create()
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
                    $registry->registerSubscribingHandler(new EnumHandler());
                }
            )->build();
    }
}
