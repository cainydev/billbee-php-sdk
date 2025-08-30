<?php

/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - now by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\BillbeeAPI\Type;

class OrderState
{
    public const ORDERED = 1;
    public const CONFIRMED = 2;
    public const PAID = 3;
    public const SHIPPED = 4;
    public const RECLAMATION = 5;
    public const DELETED = 6;
    public const CLOSED = 7;
    public const CANCELED = 8;
    public const ARCHIVED = 9;
    # CONST NOT_USED = 10;
    public const DEMAND_NOTE = 11;
    public const DEMAND_NOTE2 = 12;
    public const PACKED = 13;
    public const OFFERED = 14;
    public const REMINDER = 15;
}
