<?php
namespace Payfort\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * RedirectResponse
 *
 * This is the response class for all  requests.
 */

class RedirectResponse extends BaseResponse implements RedirectResponseInterface
{

    /**
     * Does the response require a redirect?
     *
     * @return boolean
     */
    public function isRedirect()
    {
        return true;
    }

    /**
     * Gets the redirect target url.
     *
     * @return string
     */
    public function getRedirectUrl()
    {
        return $this->request->getEndpoint();
    }

    /**
     * Get the required redirect method (either GET or POST).
     *
     * @return string
     */
    public function getRedirectMethod()
    {
        return 'POST';
    }

    /**
     * Gets the redirect form data array, if the redirect method is POST.
     *
     * @return array
     */
    public function getRedirectData()
    {
        return $this->request->getData();
    }

    /**
     * get redirect form
     */
    public function getRedirectForm()
    {
        $hiddenFields = '';
        foreach ($this->getRedirectData() as $key => $value) {
            $hiddenFields .= sprintf(
                '<input type="hidden" name="%1$s" value="%2$s" />',
                htmlentities($key, ENT_QUOTES, 'UTF-8', false),
                htmlentities($value, ENT_QUOTES, 'UTF-8', false)
            )."\n";
        }

        $output = '
<form name="payfort_payment_form" id="payfort_payment_form" action="%1$s" method="post">
    %2$s
    <input type="submit" id="submit" value="Continue" />
</form>';
        $output = sprintf(
            $output,
            htmlentities($this->getRedirectUrl(), ENT_QUOTES, 'UTF-8', false),
            $hiddenFields
        );

        return $output;
    }
}