<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Transformer;

use DateTimeImmutable;
use DateTimeInterface;
use Exception;
use InvalidArgumentException;
use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigatorInterface;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\Visitor\DeserializationVisitorInterface;
use JMS\Serializer\Visitor\SerializationVisitorInterface;

final class NativeDateTimeHandler implements SubscribingHandlerInterface
{
    /**
     * @throws Exception
     */
    public function deserialize(DeserializationVisitorInterface $visitor, mixed $data, array $type, Context $context): ?DateTimeInterface
    {
        if ($data === null) {
            return null;
        }

        if (\is_string($data)) {
            return new DateTimeImmutable($data);
        }

        throw new InvalidArgumentException('Expected string for DateTime deserialization');
    }

    public function serialize(SerializationVisitorInterface $visitor, ?DateTimeInterface $date, array $type, Context $context): ?string
    {
        return $date?->format(DateTimeInterface::ATOM);
    }

    public static function getSubscribingMethods(): array
    {
        return [
            [
                'type'      => 'DateTime',
                'format'    => 'json',
                'direction' => GraphNavigatorInterface::DIRECTION_DESERIALIZATION,
                'method'    => 'deserialize',
            ],
            [
                'type'      => 'DateTime',
                'format'    => 'json',
                'direction' => GraphNavigatorInterface::DIRECTION_SERIALIZATION,
                'method'    => 'serialize',
            ],
        ];
    }
}
