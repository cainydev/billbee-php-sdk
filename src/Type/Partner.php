<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI\Type;

enum Partner: string
{
    case SEOSHOP_LIGHTSPEED = 'seoshop';
    case PLENTYMARKETS = 'plentymarkets';
    case ETOS = 'etos';
    case AFTERBUY = 'afterbuy';
    case AMAZON = 'amazon';
    case PAYPAL = 'paypal';
    case DAWANDA = 'dawanda';
    case EBAY = 'ebay';
    case EPAGES = 'epages';
    case EPAGES_NEW = 'epagesrest';
    case ETSY = 'etsy';
    case WISH = 'wish';
    case IDEALO = 'idealo';
    case INTERAKTIV = 'interaktiv';
    case MAGENTO = 'magento';
    case MAGENTO2 = 'magento2';
    case NOTHS = 'noths';
    case OPENCART = 'opencart';
    case OXID = 'oxid';
    case PRESTASHOP = 'presta';
    case RAKUTEN = 'rakuten';
    case SHOPIFY = 'shopify';
    case VERSACOMMERCE = 'versacommerce';
    case SHOPWARE = 'shopware';
    case XT_COMMERCE = 'xtcommercev3db';
    case COMMERCESEO_V3 = 'commerceseov3';
    case GAMBIO = 'gambiorest';
    case YATEGO = 'yatego';
    case WOOCOMMERCE = 'woocommerce';
    case WOOCOMMERCE_NEW = 'woocommercerest';
    case MANUAL = 'manual';
    case JIMDO = 'jimdo';
    case WIX = 'wix';
    case CUSTOM = 'custom';
    case CUSTOMSHOP = 'customshop';
    case SERVERSPOT = 'serverspot';
    case BIGCARTEL = 'bigcartel';
    case ECWID = 'ecwid';
    case INVENTORUM = 'inventorum';
    case PIXI = 'pixi';
    case HOOD = 'hood';
}
