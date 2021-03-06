<?php
namespace Payfort\Message;

use yii\helpers\ArrayHelper;

/**
 * Authorize Request
 *
 * @method Response send()
 */
class AuthorizeRequest extends AbstractRequest
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

        $data['command']    = 'AUTHORIZATION';

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