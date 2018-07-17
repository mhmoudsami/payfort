``` install ```

composer.json
```
  "autoload": {
      "psr-4": {
          "Payfort\\" : "common/components/payfort/src"
      }
  }
```


# test 
```
	$gateway = \Omnipay\Omnipay::create('\Payfort\Redirect');
	$gateway = \Omnipay\Omnipay::create('\Payfort\Installments');
	$gateway = \Omnipay\Omnipay::create('\Payfort\CheckStatus');

	$gateway->initialize([
	    'testMode' => true,
	]);
```


# check status test
```
	$request = $gateway->checkStatus([
	    'merchant_reference'    => '8888888',
	]);
```


# purchase test
```
    $request = $gateway->purchase([
            'amount'                => 1000,
            'currency'              => 'SAR',
            'customer_email'        => 'm2@me.com',
            'customer_name'         => 'mahmoud sami',
            'phone_number'          => '01150310403',
            'order_description'     => 'hello order',
            'merchant_reference'    => '8888888',
    ]);
```



# finaly
```
    $response = $request->send();

    if ( $response->isSuccessful() ) {
        dd($response->getData());
    }elseif( $response->isRedirect() ){
        return $response->redirect();
    }else{
        dd($response->getData());
    }
```




# handling return url case
- in return controller function
```
    $gateway = \Omnipay\Omnipay::create('\Payfort\Redirect');


    $data       = ( Yii::$app->request->isPost ) 
                    ? Yii::$app->request->post() 
                    : Yii::$app->request->get();


    $response    = $gateway->completePurchase($data)->send();

    if ( $response->isSuccessful() ) {
        dd($response->getData());
    }else{
        dd($response->getData());
    }
```