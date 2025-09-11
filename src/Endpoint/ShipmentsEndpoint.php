<?php

namespace BillbeeDe\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\ClientInterface;
use BillbeeDe\BillbeeAPI\Exception\ConnectionException;
use BillbeeDe\BillbeeAPI\Exception\QuotaExceededException;
use BillbeeDe\BillbeeAPI\Model\ShipmentWithLabel;
use BillbeeDe\BillbeeAPI\Model\ShippingProvider;
use BillbeeDe\BillbeeAPI\Response\GetShippingProvidersResponse;
use BillbeeDe\BillbeeAPI\Response\ShipWithLabelResponse;
use JMS\Serializer\SerializerInterface;

readonly class ShipmentsEndpoint
{
    public function __construct(private ClientInterface $client)
    {
    }

    public function getShippingProviders(): ?GetShippingProvidersResponse
    {
        $providers = $this->client->get(
            'shipment/shippingproviders',
            [],
            sprintf('array<%s>', ShippingProvider::class),
        );

        $response = new GetShippingProvidersResponse();
        $response->data = $providers;

        return $response;
    }

    public function shipWithLabel(ShipmentWithLabel $shipment): ShipWithLabelResponse
    {
        $json = $this->client->getSerializer()->serialize($shipment, 'json');
        return $this->client->post(
            'shipment/shipwithlabel',
            $json,
            ShipWithLabelResponse::class,
        );
    }
}
