<?php
namespace Payfort\Message;

use yii\helpers\ArrayHelper;

/**
 * Purchase Request
 *
 * @method Response send()
 */
class PurchaseInstallmentsRequest extends AbstractRequest
{
	/**
	 * return main data for authorize request
	 */
    public function getData()
    {
        // add specifiec request data
        $data                   = $this->getBaseData();
        $data                   = ArrayHelper::merge($data , $this->getParameters());
        unset($data['testMode']);

        $data['command']                = 'PURCHASE';
        $data['installments']           = 'STANDALONE';
        $data['customer_country_code']  = 'KSA';


        // create signature and validate it
        $data['signature']  = $this->calcSignature($data);


        return $data;
    }

    /**
     * create response
     */
    public function sendData($data)
    {
        return $this->createResponse($data);
    }

    /**
     * create response object
     */
    protected function createResponse($data)
    {   
        return $this->response = new RedirectResponse($this, $data);
    }
}