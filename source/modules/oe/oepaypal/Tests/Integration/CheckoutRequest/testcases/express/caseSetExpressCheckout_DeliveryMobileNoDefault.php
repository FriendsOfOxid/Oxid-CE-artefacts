<?php
/**
 * This file is part of OXID eSales PayPal module.
 *
 * OXID eSales PayPal module is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * OXID eSales PayPal module is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OXID eSales PayPal module.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link      http://www.oxid-esales.com
 * @copyright (C) OXID eSales AG 2003-2018
 */

$data = array(
    'class'         => \OxidEsales\PayPalModule\Controller\ExpressCheckoutDispatcher::class,
    'action'        => 'setExpressCheckout',
    'articles'      => array(
        0 => array(
            'oxid'    => 'testVouchers1',
            'oxprice' => 10,
            'oxvat'   => 10,
            'amount'  => 3,
        ),
        1 => array(
            'oxid'    => 'testVouchers2',
            'oxprice' => 10,
            'oxvat'   => 10,
            'amount'  => 4,
        ),
    ),
    'user'          => false,
    'costs'         => array(
        'delivery' => array(
            'oxdeliveryset' => array(
                'createOnly' => true,
                'oxid'       => 'mobileShippingSet',
                'oxactive'   => 1,
                'oxtitle'    => 'TestDeliverySet',
            ),
            0               => array(
                'oxactive'     => 1,
                'oxaddsum'     => 55,
                'oxaddsumtype' => 'abs',
                'oxdeltype'    => 'p',
                'oxfinalize'   => 1,
                'oxparamend'   => 99999,
            ),
        ),
    ),
    'config'        => array(
        'blSeoMode' => false,
    ),
    'requestToShop' => array(
        'displayCartInPayPal' => true,
    ),
    'serverParams'  => array(
        'HTTP_USER_AGENT' => 'iphone',
    ),
    'expected'      => array(
        'requestToPayPal' => array(
            'VERSION'                        => '84.0',
            'PWD'                            => '',
            'USER'                           => '',
            'SIGNATURE'                      => '',
            'CALLBACKVERSION'                => '84.0',
            'LOCALECODE'                     => 'de_DE',
            'SOLUTIONTYPE'                   => 'Mark',
            'BRANDNAME'                      => 'PayPal Testshop',
            'CARTBORDERCOLOR'                => '2b8da4',
            'RETURNURL'                      => '{SHOP_URL}index.php?lang=0&sid=&rtoken=token&shp={SHOP_ID}&cl=oepaypalexpresscheckoutdispatcher&fnc=getExpressCheckoutDetails',
            'CANCELURL'                      => '{SHOP_URL}index.php?lang=0&sid=&rtoken=token&shp={SHOP_ID}&cl=basket',
            'PAYMENTREQUEST_0_PAYMENTACTION' => 'Sale',
            'CALLBACK'                       => null,
            'CALLBACKTIMEOUT'                => '6',
            'NOSHIPPING'                     => '2',
            'PAYMENTREQUEST_0_AMT'           => '70.00',
            'PAYMENTREQUEST_0_CURRENCYCODE'  => 'EUR',
            'PAYMENTREQUEST_0_ITEMAMT'       => '70.00',
            'PAYMENTREQUEST_0_SHIPPINGAMT'   => '0.00',
            'PAYMENTREQUEST_0_SHIPDISCAMT'   => '0.00',
            'L_SHIPPINGOPTIONISDEFAULT0'     => 'true',
            'L_SHIPPINGOPTIONNAME0'          => '#1',
            'L_SHIPPINGOPTIONAMOUNT0'        => '0.00',
            'PAYMENTREQUEST_0_DESC'          => 'Ihre Bestellung bei PayPal Testshop in Höhe von 70,00 EUR',
            'PAYMENTREQUEST_0_CUSTOM'        => 'Ihre Bestellung bei PayPal Testshop in Höhe von 70,00 EUR',
            'MAXAMT'                         => '71.00',
            'L_PAYMENTREQUEST_0_NAME0'       => '',
            'L_PAYMENTREQUEST_0_AMT0'        => '10.00',
            'L_PAYMENTREQUEST_0_QTY0'        => '3',
            'L_PAYMENTREQUEST_0_ITEMURL0'    => '{SHOP_URL}index.php?cl=details&amp;anid=testVouchers1',
            'L_PAYMENTREQUEST_0_NUMBER0'     => '',
            'L_PAYMENTREQUEST_0_NAME1'       => '',
            'L_PAYMENTREQUEST_0_AMT1'        => '10.00',
            'L_PAYMENTREQUEST_0_QTY1'        => '4',
            'L_PAYMENTREQUEST_0_ITEMURL1'    => '{SHOP_URL}index.php?cl=details&amp;anid=testVouchers2',
            'L_PAYMENTREQUEST_0_NUMBER1'     => '',
            'METHOD'                         => 'SetExpressCheckout',
        ),
        'header'          => array(
            0 => 'POST /cgi-bin/webscr HTTP/1.1',
            1 => 'Content-Type: application/x-www-form-urlencoded',
            2 => 'Host: api-3t.sandbox.paypal.com',
            3 => 'Connection: close',
        )
    )
);
