<?php

namespace Omnipay\AlipayExpress\Tests;

use Omnipay\Tests\GatewayTestCase;

abstract class AbstractGatewayTestCase extends GatewayTestCase
{

    protected $partner = ALIPAY_PARTNER;

    protected $key = ALIPAY_KEY;

    protected function setUp()
    {
        parent::setUp();
    }
}
