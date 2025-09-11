<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Type;

enum SendMode: int
{
    /**
     * No message will be sent
     */
    case NONE = 0;

    /**
     * The message will be sent via email to the customer email address
     */
    case EMAIL = 1;

    /**
     * The message will be sent via the shop or marketplace api (if supported)
     */
    case API = 2;

    /**
     * The message will be sent via email if the email address exists otherwise via the shop or marketplace api (if supported)
     */
    case EMAIL_THEN_API = 3;

    /**
     * The message will be sent via email to the alternative email address
     */
    case EXTERNAL_EMAIL = 4;
}
