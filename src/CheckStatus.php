<?php
namespace Payfort;

use Omnipay\Common\AbstractGateway;

/**
 * CheckStatus
 */
class CheckStatus extends BaseGateway
{
    /**
     * Get gateway display name
     */
    public function getName()
    {
    	return "payfort Check Status";
    }


    public function checkStatus(array $parameters = array())
    {
    	return $this->createRequest('\Payfort\Message\CheckStatusRequest', $parameters);
    }
}