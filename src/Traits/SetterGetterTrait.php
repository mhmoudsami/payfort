<?php
namespace Payfort\Traits;


trait SetterGetterTrait
{
    /**
     * get Merchant_identifier
     */
    public function getReturnUrl()
    {
        return $this->getParameter('return_url');
    }


    /**
     * set Merchant_identifier
     */
    public function setReturnUrl($value)
    {
        return $this->setParameter('return_url', $value);
    }


    /**
     * get Merchant Reference
     */
    public function getMerchantReference()
    {
        return $this->getParameter('merchant_reference');
    }


    /**
     * set Merchant Reference
     */
    public function setMerchantReference($value)
    {
        return $this->setParameter('merchant_reference', $value);
    }


    /**
     * get Access_code
     */
    public function getAccessCode()
    {
        return $this->getParameter('access_code');
    }


    /**
     * set Access_code
     */
    public function setAccessCode($value)
    {
        return $this->setParameter('access_code', $value);
    }




    /**
     * get curruncy
     */
    public function getCurrency()
    {
        return $this->getParameter('currency');
    }


    /**
     * set curruncy
     */
    public function setCurrency($value)
    {
        return $this->setParameter('currency', $value);
    }


    /**
     * get language
     */
    public function getLanguage()
    {
        return $this->getParameter('language');
    }


    /**
     * set language
     */
    public function setLanguage($value)
    {
        return $this->setParameter('language', $value);
    }


    /**
     * set customer name
     */
    public function getCustomerEmail()
    {
        return $this->getParameter('customer_email');
    }

    /**
     * set customer name
     */
    public function setCustomerEmail($value)
    {
        return $this->setParameter('customer_email', $value);
    }

    /**
     * get customer name
     */
    public function getCutomerName()
    {
        return $this->getParameter('customer_name');
    }

    /**
     * set customer name
     */
    public function setCustomerName($value)
    {
        $value = $this->onlyLetters($value);

        return $this->setParameter('customer_name' , $value);
    }

    /**
     * get customer name
     */
    public function getPhoneNumber()
    {
        return $this->getParameter('phone_number');
    }

    /**
     * set customer name
     */
    public function setPhoneNumber($value)
    {
        return $this->setParameter('phone_number' , $value);
    }


    /**
     * get order description
     */
    public function getOrderDescription()
    {
        return $this->getParameter('order_description');
    }

    /**
     * set order description
     */
    public function setOrderDescription($value)
    {
        $value = $this->onlyLetters($value);

        return $this->setParameter('order_description' , $value);
    }


    /**
     * get amount
     */
    public function getAmount()
    {
        return $this->getParameter('amount');
    }


    /**
     * set amount
     */
    public function setAmount($value)
    {
        $value = $this->converAmount($value);

        return $this->setParameter('amount' , $value);
    }


    /**
     * get response code
     */
    public function getResponseCode()
    {
        return $this->getParameter('response_code');
    }

    /**
     * set response code
     */
    public function setResponseCode($value)
    {
        return $this->setParameter('response_code' , $value);
    }


    /**
     * get ResponseMessage
     */
    public function getResponseMessage()
    {
        return $this->getParameter('response_message');
    }

    /**
     * set ResponseMessage
     */
    public function setResponseMessage($value)
    {
        return $this->setParameter('response_message' , $value);
    }


    /**
     * get ResponseMessage
     */
    public function getStatus()
    {
        return $this->getParameter('status');
    }

    /**
     * set ResponseMessage
     */
    public function setStatus($value)
    {
        return $this->setParameter('status' , $value);
    }


    /**
     * get fort_id
     */
    public function getFortId()
    {
        return $this->getParameter('fort_id');
    }

    /**
     * set fort_id
     */
    public function setFortId($value)
    {
        return $this->setParameter('fort_id' , $value);
    }


    /**
     * get installments
     */
    public function getInstallments()
    {
        return $this->getParameter('installments');
    }

    /**
     * set installments
     */
    public function setInstallments($value)
    {
        return $this->setParameter('installments' , $value);
    }


    /**
     * convert number
     */
    protected function converAmount($amount)
    {
        $new_amount    = 0;
        $decimalPoints = 2;
        $new_amount    = round($amount, $decimalPoints) * (pow(10, $decimalPoints));
        return $new_amount;
    }


    /**
     * calc paramter signature
     */
    protected function calcSignature($data , $type='request')
    {
        $shaString             = '';
        ksort($data);
        foreach ($data as $k => $v) {
            $shaString .= "$k=$v";
        }

        if ($type == 'request') {
            $shaString = $this->getEnvParmas('request_phrase') . $shaString . $this->getEnvParmas('request_phrase');
        }
        else {
            $shaString = $this->getEnvParmas('response_phrase') . $shaString . $this->getEnvParmas('response_phrase');
        }
        $signature = hash($this->getEnvParmas('sha_type'), $shaString);

        return $signature;
    }

    /**
     * remove invalid chars
     */
    protected function onlyLetters($string)
    {
        // $string = "sdsdتجربة٢ تجربة١ dfdfdf _!@#$%^&*()_+-0123456789 ١٢٣٤٥٦٧٨٩ \/";
        $string = preg_replace('/[^a-z\p{Arabic} ]/iu', '', $string);
        $string = trim($string);

        return $string;
    }
}