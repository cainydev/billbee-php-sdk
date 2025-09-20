<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Transformer;

use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigatorInterface;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\VisitorInterface;

final class LenientDateHandler implements SubscribingHandlerInterface
{
    /**
     * @return array{direction: int, format: string, type: string, method: string}[]
     */
    public static function getSubscribingMethods(): array
    {
        $formats = ['json'];
        $types = ['DateTimeInterface', 'DateTimeImmutable'];
        $methods = [];

        foreach ($formats as $format) {
            foreach ($types as $type) {
                $methods[] = [
                    'format' => $format,
                    'type' => $type,
                    'direction' => GraphNavigatorInterface::DIRECTION_DESERIALIZATION,
                    'method' => 'deserializeDateTimeImmutable',
                ];
                $methods[] = [
                    'format' => $format,
                    'type' => $type,
                    'direction' => GraphNavigatorInterface::DIRECTION_SERIALIZATION,
                    'method' => 'serializeDateTime',
                ];
            }
        }

        return $methods;
    }

    /**
     * Deserialize JSON value to DateTimeImmutable (used for DateTimeInterface and DateTimeImmutable types).
     *
     * @param VisitorInterface $visitor
     * @param mixed $data
     * @param array<string, mixed> $type
     * @param Context $context
     * @return \DateTimeImmutable|null
     */
    public function deserializeDateTimeImmutable(VisitorInterface $visitor, $data, array $type, Context $context): ?\DateTimeImmutable
    {
        if ($data === null || $data === '') {
            return null;
        }

        if (!is_string($data)) {
            return null;
        }

        $value = trim($data);

        try {
            return new \DateTimeImmutable($value);
        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * Serialize DateTimeImmutable/DateTimeInterface to string for JSON.
     *
     * @param VisitorInterface $visitor
     * @param \DateTimeInterface $date
     * @param array<string, mixed> $type
     * @param Context $context
     * @return string
     */
    public function serializeDateTime(VisitorInterface $visitor, $date, array $type, Context $context): string
    {
        return $date->format($type['params'][0] ?? DATE_ATOM);
    }
}
