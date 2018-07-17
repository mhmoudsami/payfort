<?php
namespace Payfort;

use Omnipay\Common\AbstractGateway;


/**
    Payfort Installments

    TEST DATA
    4546830000000003
    Expiry date: 05/21
    CVV: 123
 */
class Installments extends BaseGateway
{
    /**
     * Get gateway display name
     */
    public function getName()
    {
    	return "payfort Installments";
    }

    /**
     * purchase
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Payfort\Message\PurchaseInstallmentsRequest', $parameters);
    }
}