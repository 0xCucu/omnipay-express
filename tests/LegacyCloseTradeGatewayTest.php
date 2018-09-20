<?php

namespace Omnipay\AlipayExpress\Tests;

use Omnipay\Alipay\Common\Signer;
use Omnipay\AlipayExpress\LegacyCloseTradeGateway;
use Omnipay\AlipayExpress\Responses\LegacyCloseTradePurchaseResponse;

class LegacyCloseTradeGatewayTest extends AbstractGatewayTestCase
{

    /**
     * @var LegacyCloseTradeGateway $gateway
     */
    protected $gateway;

    public function setUp()
    {
        parent::setUp();
        $this->gateway = new LegacyCloseTradeGateway($this->getHttpClient(), $this->getHttpRequest());
        $this->gateway->setPartner($this->partner);
        $this->gateway->setKey($this->key);
        $this->gateway->setTradeNo('');
        $this->gateway->setOutOrderNo('11118144639PT229U120574P3805X1203445211');
    }

    public function testPurchase()
    {
        $response = $this->gateway->purchase()->send();
        $this->assertNotEmpty($response->getRedirectData());
    }

}
