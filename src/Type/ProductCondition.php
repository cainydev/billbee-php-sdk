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

class ProductCondition
{
    public const BRAND_NEW = 1;
    public const USED_LIKE_NEW = 2;
    public const USED_VERY_GOOD = 3;
    public const USED_GOOD = 4;
    public const USED_IN_ORDER = 5;
    public const USED_BAD = 6;
    public const BROKEN = 7;
}
