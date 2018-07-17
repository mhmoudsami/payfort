<?php
namespace Payfort\Message;

use yii\helpers\ArrayHelper;

/**
 * Purchase Request
 *
 * @method Response send()
 */
class PurchaseRequest extends AbstractRequest
{
	/**
	 * return main data for authorize request
	 */
    public function getData()
    {
        // make sure that some parameter are set and required
        // $this->validate('amount');

        // add specifiec request data
        $data               = $this->getBaseData();
        $data = ArrayHelper::merge($data , $this->getParameters());
        unset($data['testMode']);

        $data['command']    = 'PURCHASE';

        // create signature and validate it
        $data['signature']  = $this->calcSignature($data);


        return $data;
    }

    /**
     * we donot need to make any http requests because its redirect request
     * send data
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