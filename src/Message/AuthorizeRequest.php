<?php

namespace Omnipay\AlfaBank\Message;

/**
 * Class AuthorizeRequest
 * @package Omnipay\AlfaBank\Message
 */
class AuthorizeRequest extends RegisterRequest
{
    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return parent::getEndpoint() . '/registerPreAuth.do';
    }

    /**
     * @param string $contents
     * @return AuthorizeResponse
     */
    public function createResponse($contents)
    {
        return $this->response = new AuthorizeResponse($this, $contents);
    }
}
