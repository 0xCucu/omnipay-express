<?php

namespace Omnipay\AlipayExpress;

use Omnipay\Common\AbstractGateway;

abstract class AbstractLegacyGateway extends AbstractGateway
{

    public function getDefaultParameters()
    {
        return [
            'inputCharset' => 'UTF-8',
            'signType'     => 'MD5',
            // 'alipaySdk'    => 'wazidw/omnipay-alipay-express',
        ];
    }


    /**
     * @return mixed
     */
    public function getPartner()
    {
        return $this->getParameter('partner');
    }


    /**
     * @param $value
     *
     * @return $this
     */
    public function setPartner($value)
    {
        return $this->setParameter('partner', $value);
    }

    /**
     * @return mixed
     */
    public function getSignType()
    {
        return $this->getParameter('sign_type');
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->getParameter('key');
    }


    /**
     * @param $value
     *
     * @return $this
     */
    public function setKey($value)
    {
        return $this->setParameter('key', $value);
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setSignType($value)
    {
        return $this->setParameter('sign_type', $value);
    }

    /**
     * @return mixed
     */
    public function getInputCharset()
    {
        return $this->getParameter('_input_charset');
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setInputCharset($value)
    {
        return $this->setParameter('_input_charset', $value);
    }

    /**
     * @return mixed
     */
    public function getTradeNo()
    {
        return $this->getParameter('trade_no');
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setTradeNo($value)
    {
        return $this->setParameter('trade_no', $value);
    }

    /**
     * @return mixed
     */
    public function getOutOrderNo()
    {
        return $this->getParameter('out_order_no');
    }


    /**
     * @param $value
     *
     * @return $this
     */
    public function setOutOrderNo($value)
    {
        return $this->setParameter('out_order_no', $value);
    }

}
