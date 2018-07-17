<?php
namespace Payfort;

use Omnipay\Common\AbstractGateway;

/*
	supports this
    - Authorization: operation hold an amount from the Customer’s credit card account for a period of time
	- completeAuthorize: Handle return from off-site gateways after authorization
    - Purchase: you will send one single request in order to authorize and capture the transaction amount
	- completePurchase: handle return from off-site gateways after purchase
	- capture: capture the authorized amount to his account
	- Void: An operation that allows the Merchant to cancel the payment request AFTER being authorized.
	- Refund: An operation that returns the entire amount of a transaction or part of it AFTER being captured.
	- Check Status: Check Status allows the Merchant to check the status of a specific order and the status of the latest operation performed on that order
 */


/**
 * PayFort
 * @link https://github.com/thephpleague/omnipay-example
 * @link https://github.com/thephpleague/omnipay-skeleton/
 * @link https://github.com/thephpleague/omnipay-dummy/
 * @link https://docs.payfort.com/docs/maintenance-operations/build/index.html
 * @link https://docs.payfort.com/docs/redirection/build/index.html
 * @link https://docs.payfort.com/docs/in-common/build/index.html
 * @link https://docs.payfort.com/docs/installments/build/index.html
 */
abstract class BaseGateway extends AbstractGateway
{

    /**
     * get payfort default parameter
     */
    public function getDefaultParameters()
    {
    	return [];
    }

    /**
     * purchase
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Payfort\Message\PurchaseRequest', $parameters);
    }

    /**
     * completePurchase
     */
    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest('\Payfort\Message\CompletePurchaseRequest', $parameters);
    }


    /**
     * authorize
     * @todo later
     */
    public function authorize(array $parameters = array())
    {
        return $this->createRequest('\Payfort\Message\AuthorizeRequest', $parameters);
    }

    /**
     * completeAuthorize
     */
    // public function completeAuthorize(array $parameters = array())
    // {
    //     return $this->createRequest('\Payfort\Message\TransactionReferenceRequest', $parameters);
    // }

    /**
     * capture
     * @todo later
     */
    // public function capture(array $parameters = array())
    // {
    //     return $this->createRequest('\Omnipay\Dummy\Message\TransactionReferenceRequest', $parameters);
    // }

    /**
     * refund
     * @todo later
     */
    // public function refund(array $parameters = array())
    // {
    //     return $this->createRequest('\Omnipay\Dummy\Message\TransactionReferenceRequest', $parameters);
    // }

    /**
     * void
     * @todo later
     */
    // public function void(array $parameters = array())
    // {
    //     return $this->createRequest('\Omnipay\Dummy\Message\TransactionReferenceRequest', $parameters);
    // }
}