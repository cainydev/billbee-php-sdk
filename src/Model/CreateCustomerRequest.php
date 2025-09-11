<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Represents a create customer request in the Billbee API
 */
final class CreateCustomerRequest
{
    public function __construct(
        #[Serializer\Type("BillbeeDe\BillbeeAPI\Model\CustomerAddress")]
        #[Serializer\SerializedName("Address")]
        public CustomerAddress $address,
    ) {
    }
}
