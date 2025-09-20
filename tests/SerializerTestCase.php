<?php

namespace BillbeeDe\Tests\BillbeeAPI;

use BillbeeDe\BillbeeAPI\SerializerFactory;
use BillbeeDe\BillbeeAPI\Transformer\AsIsTransformer;
use BillbeeDe\BillbeeAPI\Transformer\DefinitionConfigTransformer;
use JMS\Serializer\Handler\EnumHandler;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use JMS\Serializer\Visitor\Factory\JsonSerializationVisitorFactory;
use PHPUnit\Framework\TestCase;
use ReflectionMethod;
use ReflectionNamedType;

abstract class SerializerTestCase extends TestCase
{
    abstract public static function getFixturePath(): string;
    abstract public static function getExpectedObject(): mixed;

    private static SerializerInterface $serializer;

    public static function getTargetType(): string
    {
        $method = new ReflectionMethod(static::class, 'getExpectedObject');
        $type = $method->getReturnType();

        if ($type instanceof ReflectionNamedType && !$type->isBuiltin()) {
            return $type->getName();
        }

        throw new \RuntimeException("Cannot infer target type: please override getTargetType in " . static::class);
    }

    public function testSerializeFixture(): void
    {
        if ($fixture = file_get_contents(__DIR__ . '/fixtures/' . static::getFixturePath())) {
            $fixture = trim($fixture);
            $serialized = self::getSerializer()->serialize(static::getExpectedObject(), 'json');
            self::assertEquals($fixture, $serialized);
        } else {
            self::markTestSkipped('No fixture found at ' . __DIR__ . '/fixtures/' . static::getFixturePath());
        }
    }

    public function testDeserializeFixture(): void
    {
        if ($fixture = file_get_contents(__DIR__ . '/fixtures/' . static::getFixturePath())) {
            $fixture = trim($fixture);
            $deserialized = self::getSerializer()->deserialize($fixture, static::getTargetType(), 'json');
            self::assertEquals(static::getExpectedObject(), $deserialized);
        } else {
            self::markTestSkipped('No fixture found at ' . __DIR__ . '/fixtures/' . static::getFixturePath());
        }
    }

    private static function getSerializer(): SerializerInterface
    {
        return self::$serializer ??= SerializerFactory::createPretty();
    }
}
