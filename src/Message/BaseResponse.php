<?php
namespace Payfort\Message;

use Payfort\Helpers\Messages;
use Payfort\Helpers\Statuses;
use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * BaseResponse
 *
 * This is the response class for all  requests.
 */

class BaseResponse extends AbstractResponse
{
    /**
     * get response data
     */
    public function getData()
    {
        return $this->data;
    }


    /**
     * check if request is successfull
     */
    public function isSuccessful()
    {
        return isset($this->data['response_code']) 
                && 
               ( substr($this->data['response_code'], 2) == '000' );
    }


    /**
     * check if request is successfull
     */
    public function getStatus()
    {
        return $this->data['status'];
    }

    /**
     * ger transaction reg
     */
    public function getTransactionReference()
    {
        return isset($this->data['fort_id']) ? $this->data['fort_id'] : null;
    }

    /**
     * get transaction id
     */
    public function getTransactionId()
    {
        return isset($this->data['merchant_reference']) ? $this->data['merchant_reference'] : null;
    }

    /**
     * get response message
     */
    public function getMessage()
    {
        return isset($this->data['response_message']) ? $this->data['response_message'] : null;
    }

    /**
     * get code
     */
    public function getCode()
    {
        return isset($this->data['response_code']) ? $this->data['response_code'] : null;
    }
}