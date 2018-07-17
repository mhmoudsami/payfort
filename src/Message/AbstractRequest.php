<?php
namespace Payfort\Message;

use \GuzzleHttp\Client;
use yii\helpers\Url;
use Omnipay\Common\Message\AbstractRequest as BaseAbstractRequest;

/**
 * Abstract Request
 *
 */
abstract class AbstractRequest extends BaseAbstractRequest
{
    /**
     * setter and getter trait
     */
    use \Payfort\Traits\SetterGetterTrait;

    /**
     * send request
     * @todo not for redirect requsts
     */
    public function sendData($data)
    {
        $body = json_encode($data);

        $httpResponse = $this->httpClient->request(
            "POST",
            $this->getEndpoint(),
            array(
                'Accept'            => 'application/json',
                'Content-Type'      => 'application/json',
                'allow_redirects'   => true,
            ),
            $body
        );

        $data = json_decode($httpResponse->getBody(), true);

        return $this->createResponse($data);
    }

    /**
     * get base data
     */
    protected function getBaseData()
    {
        // $return_url = Url::to(['/credit-payment/return'] , true);
        $return_url = Url::to(['/site/return'] , true);

        return [
            'access_code'           => $this->getEnvParmas('access_code'),
            'merchant_identifier'   => $this->getEnvParmas('merchant_identifier'),
            'currency'              => 'SAR',
            'language'              => 'ar',
            'return_url'            => $return_url,
            'testMode'              => false,
        ];
    }

    /**
     * get end point based on enviroment
     */
    protected function getEnvParmas($key=null)
    {
        $params = [];

        // test env vars
        if ( $this->getTestMode() ) {
            $params =  [
                'access_code'           => '26qD1Kjvo0vdxVRLFmCE',
                'merchant_identifier'   => 'oGoVJQXK',
                'endpoint'              => 'https://sbcheckout.payfort.com/FortAPI/paymentPage',
                'sha_type'              => 'sha256',
                'request_phrase'        => 'TESTSHAIN',
                'response_phrase'       => 'TESTSHAOUT',
            ];
        }else{
            // live env vars
            $params = [
                'access_code'           => 'QrPWptke6i3Cn5GY4gi1',
                'merchant_identifier'   => 'VSxioSok',
                'endpoint'              => 'https://checkout.payfort.com/FortAPI/paymentPage',
                'sha_type'              => 'sha256',
                'request_phrase'        => 'TESTSHAIN',
                'response_phrase'       => 'TESTSHAOUT',
            ];
        }

        return ( $key && isset($params[$key]) ) ? $params[$key] : $params;
    }


    /**
     * get end point
     */
    public function getEndpoint()
    {
        return $this->getEnvParmas('endpoint');
    }


    /**
     * create response object
     */
    protected function createResponse($data)
    {   
        return $this->response = new BaseResponse($this, $data);
    }
}