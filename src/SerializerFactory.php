<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI;

use BillbeeDe\BillbeeAPI\Transformer\AsIsTransformer;
use BillbeeDe\BillbeeAPI\Transformer\DefinitionConfigTransformer;
use BillbeeDe\BillbeeAPI\Transformer\NativeDateTimeHandler;
use JMS\Serializer\Handler\EnumHandler;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

final class SerializerFactory
{
    public static function create(): SerializerInterface
    {
        return SerializerBuilder::create()
            ->addDefaultDeserializationVisitors()
            ->addDefaultSerializationVisitors()
            ->addDefaultHandlers()
            ->addDefaultListeners()
            ->configureHandlers(function (HandlerRegistry $registry) {
                $registry->registerSubscribingHandler(new AsIsTransformer());
                $registry->registerSubscribingHandler(new DefinitionConfigTransformer());
                $registry->registerSubscribingHandler(new NativeDateTimeHandler());
                $registry->registerSubscribingHandler(new EnumHandler());
            })
            ->build();
    }
}
