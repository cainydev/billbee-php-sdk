<?php

/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - now by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@billbee.io>
 */

namespace BillbeeDe\BillbeeAPI\Type;

class LayoutType
{
    public const INVOICE = 0;
    public const LABEL = 1;
    public const DELIVERY_NOTE = 2;
    public const ORDER_COMMIT = 3;
    public const OFFER = 4;
    public const CANCELLATION_INVOICE = 5;
}
