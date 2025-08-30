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

class SearchMode
{
    public const _AND = 0;
    public const _OR = 1;
    public const _EXPERT = 2;
    public const _PHRASE_PFX = 3;
    public const _SUGGEST = 4;
}
