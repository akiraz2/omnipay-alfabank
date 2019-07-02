<?php

namespace Omnipay\AlfaBank\Message;

use Omnipay\Common\Message\ResponseInterface;

class ReceiptRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $service = 'getReceiptStatus.do';

    /**
     * @return mixed
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getData()
    {
        $this->validate('orderId');
        $data = array_merge(
            $this->getAuthData(),
            [
                'orderId' => $this->getParameter('orderId'),
            ]
        );
        return $data;
    }

    /**
     * Send the request with specified data
     *
     * @param  array $data The data to send
     * @return ResponseInterface
     */
    public function sendData($data)
    {
        $httpResponse = $this->httpClient->request(
            'POST',
            $this->createUrlTo($this->service),
            $this->getHeaders(),
            http_build_query($data)
        );

        return $this->response = new ReceiptResponse(
            $this,
            json_decode($httpResponse->getBody()->getContents(), true)
        );
    }
}
