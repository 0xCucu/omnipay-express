<?php

namespace Omnipay\AlipayExpress\Requests;

use GuzzleHttp\Client;
use Omnipay\AlipayExpress\Responses\LegacyCloseTradePurchaseResponse;
use Omnipay\Alipay\Requests\AbstractLegacyRequest;
use Omnipay\Common\Message\ResponseInterface;

/**
 * Class LegacyCloseTradePurchaseRequest
 * @package   Omnipay\AlipayExpress\Requests
 * @link http://aopsdkdownload.cn-hangzhou.alipay-pub.aliyun-inc.com/demo/alipayclosetrade.zip
 */
class LegacyCloseTradePurchaseRequest extends AbstractLegacyRequest
{

    protected $service = 'close_trade';

    /**
     * Get the raw data array for this message. The format of this varies from gateway to
     * gateway, but will usually be either an associative array, or a SimpleXMLElement.
     *
     * @return mixed
     */
    public function getData()
    {
        $this->validateParams();

        $data = [
            'service' => $this->service,
            'partner' => $this->getPartner(),
            'trade_no' => $this->getTradeNo(),
            'out_order_no' => $this->getOutOrderNo(),
            '_input_charset' => $this->getInputCharset(),
        ];
        $data['sign'] = $this->sign($data, $this->getSignType());
        $data['sign_type'] = $this->getSignType();

        return $data;
    }

    protected function validateParams()
    {
        $this->validate(
            'partner',
            '_input_charset',
            'sign_type'
        );

        $this->validateOne(
            'trade_no',
            'out_order_no'
        );
    }

    /**
     * @return mixed
     */
    public function getSignType()
    {
        return $this->getParameter('sign_type');
    }

    /**
     * Send the request with specified data
     *
     * @param  mixed $data The data to send
     *
     * @return ResponseInterface
     */
    public function sendData($data)
    {
        $client = new Client();
        $url = sprintf('%s?%', $this->getEndpoint(), '_input_charset=' . $this->getInputCharset());
        $response = $client->request('POST', $url, [
            'form_params' => $data,
        ]);
        $body = $response->getBody(true);
        $responseData = $body->getContents();
        $xml = simplexml_load_string($responseData);
        $json = json_encode($xml);
        $data = json_decode($json, true);
        return $this->response = new LegacyCloseTradePurchaseResponse($this, $data);
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
        return $this->setParameter('_input_charset', strtolower($value));
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

    /**
     * @return mixed
     */
    public function getIp()
    {
        return $this->getParameter('total_fee');
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setIp($value)
    {
        return $this->setParameter('total_fee', $value);
    }

    /**
     * @return mixed
     */
    public function getTradeRole()
    {
        return $this->getParameter('trade_role');
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setTradeRole($value)
    {
        return $this->setParameter('trade_role', $value);
    }
}
