<?php

require __DIR__.'/src/functions.php';

use KejawenLab\PaymentGateway\Doku\Api;
use KejawenLab\PaymentGateway\Doku\BasketFormatter;
use KejawenLab\PaymentGateway\Doku\Billing;
use KejawenLab\PaymentGateway\Doku\Hasher;

$bill = [
    'amount' => 100000.00,
    'invoice' => sha1(date('YmdHis')),
    'currency' => 360,
];

$hasher = new Hasher();
$words = $hasher->rawWords($bill);

$payload = [
    'mall_id' => Api::MALL_ID,
    'shared_key' => Api::SHARED_KEY,
    'req_mall_id' => Api::MALL_ID,
    'req_chain_merchant' => 'NA',
    'req_amount' => $bill['amount'],
    'req_words' => $words,
    'req_trans_id_merchant' => $bill['invoice'],
    'req_purchase_amount' => $bill['amount'],
    'req_request_date_time' => date('YmdHis'),
    'req_session_id' => $bill['invoice'],
    'req_email' => 'surya.kejawen@gmail.com',
    'req_name' => 'Muhamad Surya Iksanudin',
    'req_basket' => BasketFormatter::format([
        'name' => 'Kurekan Kuping',
        'amount' => 100000.00,
        'quantity' => 1,
        'subtotal' => 100000.00,
    ]),
    'req_address' => 'Di rumah',
    'req_mobile_phone' => 'Di rumah',
];

$billing = new Billing($payload);
bank_transfer($billing);
