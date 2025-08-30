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

class EventType
{
    public const ORDER_IMPORTED = 0;
    public const BILL_PRINTED = 1;
    public const LABEL_PRINTED = 2;
    public const ACCOUNT_CREATED = 3;
    public const ACCOUNT_DELETED = 4;
    public const ORDER_DELETED = 5;
    public const ORDER_DETAIL_DELETED = 6;
    public const ORDER_DETAIL_ADDED = 7;
    public const ACCOUNT_SYNCED = 8;
    public const ORDER_STATE_SYNCED = 9;
    public const ORDER_EXPORTED = 10;
    public const DELIVERY_NOTE_PRINTED = 11;
    public const ORDER_SHIPPED = 12;
    public const ORDER_PAID = 13;
    public const USER_ASSIGNED_TO_ORDER = 14;
    public const ORDER_STATE_CHANGED = 15;
    public const CUSTOMERS_JOINED = 16;
    public const E_MAIL_CHANGED = 17;
    public const SHIPMENT_CREATED = 18;
    public const ORDER_COMMIT_PRINTED = 19;
    public const ORDER_FORWARDED = 20;
    public const ACCOUNT_SYNC_ERROR = 21;
    public const CUSTOMER_INVOICE_DOWNLOAD = 22;
    public const CUSTOMER_NOTIFIED = 23;
    public const ORDER_CANCELED = 24;
    public const SHIPMENT_STATUS = 25;
    public const CUSTOMER_FILE_DOWNLOAD = 26;
    public const PAYMENT_IMPORTED = 27;
    public const RULE_EXECUTED = 28;
    public const CREATED_BY_API = 29;
    public const OFFER_PRINTED = 30;
    public const EMAIL_SENT = 31;
    public const EMAIL_FAILED = 32;
    public const ORDER_FORWARD_FAILED = 33;
    public const ORDER_DATA_FORWARD_FAILED = 34;
    public const SEND_FILE_TO_CLOUD_DEVICE_FAILED = 35;
    public const LOG_IN = 36;
    public const LOG_OUT = 37;
    public const BOOK_SERVICE = 38;
    public const CANCEL_SERVICE = 39;
    public const IMPERSONATED = 40;
    public const STOCK_SYNCED = 41;
    public const STOCK_SYNC_FAILED = 42;
    public const UPLOADED_FILE = 43;
    public const PAYMENT_BATCH_READ = 44;
    public const PAYMENT_BATCH_FAILED = 45;
    public const USER_ACCOUNT_PAY_DETAILS_CHANGED = 46;
    public const TRANSLATE = 47;
    public const PRODUCT_UPLOADED = 48;
    public const ORDER_EXPORTED_TO_BOOKKEEPING = 49;
    public const ORDER_EXPORT_TO_BOOKKEEPING_FAILED = 50;
    public const PAYMENT_EXPORTED_TO_BOOKKEEPING = 51;
    public const PAYMENT_EXPORT_TO_BOOKKEEPING_FAILED = 52;
    public const ACCOUNT_PAYMENT_TYPE_CHANGED = 53;
    public const ACCOUNT_TEST_PHASE_CHANGED = 54;
    public const API_USAGE = 55;
    public const PRODUCT_UPLOAD_FAILED = 56;
    public const RECALCULATED_STOCK_MIN = 57;
    public const RECALCULATED_STOCK_DESIRED = 58;
    public const SHIPMENT_FAILED = 59;
    public const CUSTOMER_FILE_DOWNLOAD_DA_WANDA = 60;
    public const ORDER_DETAIL_MODIFIED = 61;
    public const ORDER_MODIFIED = 62;
    public const ORDER_STATE_TRANSFERED = 63;
    public const ORDER_STATE_TRANSFER_FAILED = 64;
    public const PAYMENT_CREATED = 65;
    public const SHOP_CATEGORY_SYNC_ERROR = 66;
    public const BILLBEE_INVOICE_PAYED = 67;
    public const BILLBEE_INVOICE_PAYMENT_FAILED = 68;
    public const SHOP_CREATED = 69;
    public const SHOP_MODIFIED = 70;
    public const SHOP_DELETED = 71;
    public const SHOP_CONVERTED = 72;
    public const RULE_FAILED = 73;
    public const LOW_STOCK = 74;
    public const ARTICLE_IMPORT_FINISHED = 75;
    public const FEATURE_FUNDING_AMOUNT_CHANGED = 76;
}
