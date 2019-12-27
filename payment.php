<?php

require __DIR__.'/src/doku.php';

use KejawenLab\PaymentGateway\Doku\Api;
use KejawenLab\PaymentGateway\Doku\Customer;
use KejawenLab\PaymentGateway\Doku\Item;
use KejawenLab\PaymentGateway\Doku\Hasher;
use KejawenLab\PaymentGateway\Doku\Payload;
use KejawenLab\PaymentGateway\Doku\TransactionId;

$api = new Api('11115699', 'eXka8Oo93UAj');
$hasher = new Hasher($api);

$customer = new Customer('Surya', 'surya.kejawen@gmail.com', '087800093915', 'Tanah Abang II Jakarta Pusat');
$item1 = new Item('Jeruk', 10000.0, 1);
$item2 = new Item('Buku', 100000.0, 1);
$transactionId = new TransactionId(date('YmdHis'));

$payload = new Payload($hasher);
$payload->setData($transactionId, $customer, [$item1, $item2]);

doku_generate_pay_code($api, $payload);
