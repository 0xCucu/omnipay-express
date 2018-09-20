# Omnipay: Alipay Express

* 增加支付宝关闭订单接口

[![Latest Stable Version](https://poser.pugx.org/wazidw/omnipay-express/v/stable)](https://packagist.org/packages/wazidw/omnipay-express)
[![Total Downloads](https://poser.pugx.org/wazidw/omnipay-express/downloads)](https://packagist.org/packages/wazidw/omnipay-express)
[![Latest Unstable Version](https://poser.pugx.org/wazidw/omnipay-express/v/unstable)](https://packagist.org/packages/wazidw/omnipay-express)
[![License](https://poser.pugx.org/wazidw/omnipay-express/license)](https://packagist.org/packages/wazidw/omnipay-express)


[Omnipay](https://github.com/omnipay/omnipay) is a framework agnostic, multi-gateway payment
processing library for PHP 5.3+. This package implements Alipay support for Omnipay.

> Cross-border Alipay payment please use [`lokielse/omnipay-alipay`](https://github.com/lokielse/omnipay-alipay)

## Installation

Omnipay is installed via [Composer](http://getcomposer.org/). To install, simply add it to your `composer.json` file:

```json
{
    "require": {
        "wazidw/omnipay-express": "dev-develop"
    }
}
```

And run composer to update your dependencies:

    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar update

## Basic Usage

The following gateways are provided by this package:

* Alipay_AopApp  (Alipay APP Gateway)  支付宝APP支付 - new
* Alipay_AopF2F  (Alipay Face To Face Gateway) 支付宝当面付 - new  
* Alipay_AopWap  (Alipay WAP Gateway)  支付宝手机网站支付 - new   
* Alipay_LegacyApp   (Alipay Legacy APP Gateway)   支付宝APP支付
* Alipay_LegacyExpress   (Alipay Legacy Express Gateway)   支付宝即时到账 
* Alipay_LegacyWap   (Alipay Legacy WAP Gateway)   支付宝手机网站支付

基于lokielse的工作，增加了以下接口

* AlipayExpress_LegacyCloseTrade  (Alipay Express Checkout) 支付宝交易关闭接口


## Usage

### CloseTrade
```php
$gateway = Omnipay::create('AlipayExpress_LegacyCloseTrade');
$gateway->setPartner('partner');
$gateway->setKey('key');
$gateway->setTradeNo('trade_no');//支付宝交易号
$gateway->setOutOrderNo('out_order_no');//商户网站唯 一订单号
$request = $gateway->purchase();
$response = $request->send();

// 返回数据
$response->getRedirectData();
// 返回错误
$error = $response->getError();
```


For general usage instructions, please see the main [Omnipay](https://github.com/omnipay/omnipay)
repository.

## Related

- [Omnipay-Alipay](https://github.com/lokielse/omnipay-alipay)
- [Laravel-Omnipay](https://github.com/ignited/laravel-omnipay)
- [Omnipay-GlobalAlipay](https://github.com/lokielse/omnipay-global-alipay)
- [Omnipay-WechatPay](https://github.com/lokielse/omnipay-wechatpay)
- [Omnipay-UnionPay](https://github.com/lokielse/omnipay-unionpay)

## Support

If you are having general issues with Omnipay, we suggest posting on
[Stack Overflow](http://stackoverflow.com/). Be sure to add the
[omnipay tag](http://stackoverflow.com/questions/tagged/omnipay) so it can be easily found.

If you want to keep up to date with release anouncements, discuss ideas for the project,
or ask more detailed questions, there is also a [mailing list](https://groups.google.com/forum/#!forum/omnipay) which
you can subscribe to.

If you believe you have found a bug, please report it using the [GitHub issue tracker](https://github.com/lokielse/omnipay-alipay/issues),
or better yet, fork the library and submit a pull request.