<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

require_once ('mercadopago.php');

$mp = new MP('APP_USR-1827735954858815-102614-3695721e1e7aa4d04e76e8453fd6939a__LC_LD__-256958019'); 

$payment_data = array(
    "transaction_amount"   => 100, //valor da compra
    "token"                => $_POST['token'], //token gerado pelo javascript da index.php
    "description"          => "Produto de teste", //descrição da compra
    "installments"         => intval($_POST['installments']), //parcelas
    "payment_method_id"    => 'visa', //forma de pagamento (visa, master, amex...)
    "payer"                => array ("email" => "test@testuser.com"), //e-mail do comprador
    "statement_descriptor" => "Danilo", //nome para aparecer na fatura do cartão do cliente
    "notification_url" 	   => "http://c74f0aad.ngrok.io/hml/webhooks.php",

    
);

$payment = $mp->post("/v1/payments", $payment_data);

echo "<pre>";
print_r($payment);



?>