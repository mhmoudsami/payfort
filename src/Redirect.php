<?php
namespace Payfort;

use Omnipay\Common\AbstractGateway;


/**
 * Payfort Redirect
 */
class Redirect extends BaseGateway
{
    /**
     * Get gateway display name
     */
    public function getName()
    {
    	return "payfort redirect";
    }
}