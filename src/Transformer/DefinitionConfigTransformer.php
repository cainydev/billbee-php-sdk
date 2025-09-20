<?php

namespace BillbeeDe\BillbeeAPI\Transformer;

use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigatorInterface;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonDeserializationVisitor;
use JMS\Serializer\JsonSerializationVisitor;

class DefinitionConfigTransformer implements SubscribingHandlerInterface
{
    /**
     * @param array<string, mixed> $data
     * @param array<string, mixed> $type
     * @return array<string, mixed>
     */
    public static function serialize(JsonSerializationVisitor $visitor, array $data, array $type, Context $context): array
    {
        if (isset($data['Choices']) && is_array($data['Choices'])) {
            $data['Choices'] = implode("\n", $data['Choices']);
        }

        return $data;
    }

    /**
     * @param JsonDeserializationVisitor $visitor
     * @param array<string, mixed> $data
     * @param array<string, mixed> $type
     * @param Context $context
     * @return array<string, mixed>
     */
    public static function deserialize(JsonDeserializationVisitor $visitor, array $data, array $type, Context $context): array
    {
        if (isset($data['Choices']) && !is_array($data['Choices'])) {
            $choices = is_string($data['Choices']) ? $data['Choices'] : '';
            $data['Choices'] = explode("\n", $choices);
        }

        return $data;
    }

    /**
     * @return array{direction: int, format: string, type: string, method: string}[]
     */
    public static function getSubscribingMethods(): array
    {
        return [
            [
                'direction' => GraphNavigatorInterface::DIRECTION_SERIALIZATION,
                'format' => 'json',
                'type' => 'CustomField',
                'method' => 'serialize',
            ],
            [
                'direction' => GraphNavigatorInterface::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => 'CustomField',
                'method' => 'deserialize',
            ],
        ];
    }
}
