<?php
    //add GloballyPaid config and SDK library
    require_once 'config.php';
    
    //set rquest header to JSON for jquery ajax call
    header('Content-Type: application/json');

    //check sdk installation
    if(!class_exists('GloballyPaid')){
        echo json_encode(['title'=>'GloballyPaid PHP sdk is not installed!<br><a href="https://github.com/globallypaid/globallypaid-sdk-php" target="_blank">Install SDK!</a>', 'errors' => 'yes']);
        die();
    }
    
    //create instance of the SDK
    $GloballyPaid = new GloballyPaid($config);

    //check if ajax request contain token
    if (!isset($_REQUEST['token'])) {
        echo json_encode(['title' => 'Token is required', 'errors' => 'yes']);
        die();
    }
    
    //prepare body data for GloballyPaid charge call
    $transactionData = [
        'amount' => rand(100, 9999), //amount to charge
        'currency' => 'usd', //currency
        'source' => $_REQUEST['token'], //add token from ajax request to source
        'metadata' => [ //You can send us your data from your system for better tracking transactions
            'client_customer_id'=> '123123', //your internal client id
            'client_transaction_id' => 'tr' . rand(100000, 999999), //your internal transaction id
            'client_invoice_id' => rand(100, 999) . '/11-2020', //your internal invoice id or order number
            'client_transaction_description' => 'Your order number is #' . rand(10000, 99999), //your transaction description
        ]
    ];

    //charge call
    $charge = $GloballyPaid->charges->create($transactionData);

    //if $charge is false then show errors in json format 
    if (!$charge) {
        echo json_encode($GloballyPaid->errors());
        die();
    }

    //show successful response for ajax response
    echo json_encode($charge);

?>