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

class PaymentType
{
    public const BANK_TRANSFER = 1;
    public const CASH_ON_DELIVERY = 2;
    public const PAYPAL = 3;
    public const CASH = 4;
    public const VOUCHER = 6;
    public const SOFORTUEBERWEISUNG = 19;
    public const MONEY_ORDER = 20; // Etsy Specific
    public const CHECK = 21;
    public const OTHER = 22;
    public const DEBIT = 23;
    public const MONEYBOOKERS = 24;
    public const KLARNA = 25;
    public const INVOICE = 26;
    public const MONEYBOOKERS_CREDIT_CARD = 27;
    public const MONEYBOOKERS_DEBIT = 28;
    public const BILLPAY_INVOICE = 29;
    public const BILLPAY_DEBIT = 30;
    public const CREDIT_CARD = 31;
    public const MAESTRO = 32;
    public const IDEAL = 33;
    public const EPS = 34;
    public const P24 = 35;
    public const CLICK_AND_BUY = 36;
    public const GIROPAY = 37;
    public const NOVALNET_DEBIT = 38;
    public const KLARNA_PARTPAYMENT = 39;
    public const IPAYMENT_CC = 40;
    public const BILLSAFE = 41;
    public const TEST_ORDER = 42;
    public const WIRECARD_CREDIT_CARD = 43;
    public const AMAZON_PAYMENTS = 44;
    public const SECUPAY_CREDIT_CARD = 45;
    public const SECUPAY_DEBIT = 46;
    public const WIRECARD_DEBIT = 47;
    public const EC = 48;
    public const PAYMILL_CREDIT_CARD = 49;
    public const NOVALNET_CREDIT_CARD = 50;
    public const NOVALNET_INVOICE = 51;
    public const NOVALNET_PAYPAL = 52;
    public const PAYMILL = 53;
    public const INVOICE_PAYPAL = 54;
    public const SELEKKT = 55;
    public const AVOCADOSTORE = 56;
    public const DIRECT_CHECKOUT = 57;
    public const RAKUTEN = 58;
    public const PRE_PAYMENT = 59;
    public const COMMISSION_SETTLEMENT = 60;
    public const AMAZON_MARKETPLACE = 61;
    public const AMAZON_PAYMENTS_ADVANCED = 62;
    public const STRIPE = 63;
    public const BILLPAY_PAYLATER = 64;
    public const POSTFINANCE = 65;
    public const IZETTLE = 66;
    public const SUMUP = 67;
    public const PAYLEVEN = 68;
    public const ATALANDA = 69;
    public const SAFERPAY_CREDIT_CARD = 70;
    public const WIRECARD_PAYPAL = 71;
    public const MICROPAYMENT = 72;
    public const HIRE_PURCHASE = 73;
    public const WAYFAIR = 74;
    public const MANGOPAY_PAYPAL = 75;
    public const MANGOPAY_SOFORTUEBERWEISUNG = 76;
    public const MANGOPAY_CREDIT_CARD = 77;
    public const MANGOPAY_IDEAL = 78;
    public const PAYPAL_EXPRESS = 79;
    public const PAYPAL_DEBIT = 80;
    public const PAYPAL_CREDIT_CARD = 81;
    public const WISH = 82;
    public const BANCONTACT_MISTER_CASH = 83;
    public const BELFIUS_DIRECT_NET = 84;
    public const KBC_CBC_BETAALKNOP = 85;
    public const NOVALNET_PRZELEWY24 = 86;
    public const NOVALNET_VORKASSE = 87;
    public const NOVALNET_INSTANTBANK = 88;
    public const NOVALNET_IDEAL = 89;
    public const NOVALNET_EPS = 90;
    public const NOVALNET_GIROPAY = 91;
    public const NOVALNET_BARZAHLEN = 92;
    public const REAL_DE = 93;
    public const FRUUGO = 94;
    public const CDISCOUNT = 95;
    public const PAY_DIREKT = 96;
    public const ETSY_PAYMENTS = 97;
}
