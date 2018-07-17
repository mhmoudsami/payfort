<?php
namespace Payfort\Message;

use yii\helpers\ArrayHelper;

/**
 * Check Status Request
 *
 * @method Response send()
 */
class CheckStatusRequest extends AbstractRequest
{
	/**
	 * return main data for authorize request
	 */
    public function getData()
    {
        $data = [
            'access_code'           => $this->getEnvParmas('access_code'),
            'merchant_identifier'   => $this->getEnvParmas('merchant_identifier'),
            'language'              => 'ar',
            'query_command'         => 'CHECK_STATUS',
            'merchant_reference'    => $this->getParameter('merchant_reference'),
        ];

        $data['signature']      = $this->calcSignature($data);

        return $data;
    }

    /**
     * 
     */
    public function getEndpoint()
    {
        if ( $this->getTestMode() ) {
            return "https://sbpaymentservices.payfort.com/FortAPI/paymentApi";
        }

        return "https://paymentservices.payfort.com/FortAPI/paymentApi";
    }
}