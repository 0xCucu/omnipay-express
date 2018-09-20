<?php

namespace Omnipay\AlipayExpress;

use Omnipay\AlipayExpress\Requests\LegacyCloseTradePurchaseRequest;
use Omnipay\Common\AbstractGateway;

/**
 * Class LegacyCloseTradeGateway
 * @package  Omnipay\AlipayExpress
 * @link http://aopsdkdownload.cn-hangzhou.alipay-pub.aliyun-inc.com/demo/alipayclosetrade.zip
 */
class LegacyCloseTradeGateway extends AbstractLegacyGateway
{

    /**
     * Get gateway display name
     *
     * This can be used by carts to get the display name for each gateway.
     */
    public function getName()
    {
        return 'AlipayExpress Legacy CloseTrade Gateway';
    }

    /**
     * @param array $parameters
     *
     * @return LegacyCloseTradePurchaseRequest
     */
    public function purchase(array $parameters = [])
    {
        return $this->createRequest(LegacyCloseTradePurchaseRequest::class, $parameters);
    }
}
