<?php
namespace Payfort\Message;

use yii\helpers\ArrayHelper;

/**
 * Complete Purchase Request
 *
 * @method Response send()
 */
class CompletePurchaseRequest extends AbstractRequest
{
	/**
	 * return main data for authorize request
	 */
    public function getData()
    {
        // add specifiec request data
        $data               = $this->getBaseData();

        $data = ArrayHelper::merge($data , $this->getParameters());
        unset($data['testMode']);

        // $data['command']    = 'PURCHASE';

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
}