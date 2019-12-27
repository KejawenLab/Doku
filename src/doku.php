<?php

/**
 * @author Muhamad Surya Iksanudin <surya.iksanudin@gmail.com>
 */

require __DIR__.'/Api.php';
require __DIR__.'/Customer.php';
require __DIR__.'/Hasher.php';
require __DIR__.'/Item.php';
require __DIR__.'/Payload.php';
require __DIR__.'/Payment.php';
require __DIR__.'/PaymentChannel.php';
require __DIR__.'/TransactionId.php';

use KejawenLab\PaymentGateway\Doku\Api;
use KejawenLab\PaymentGateway\Doku\Payload;
use KejawenLab\PaymentGateway\Doku\Payment;

function doku_pre_payment(Api $api, Payload $payload): array
{
    $payment = new Payment($api);

    return $payment->prePayment($payload);
}

function doku_payment(Api $api, Payload $payload): array
{
    $payment = new Payment($api);

    return $payment->payment($payload);
}

function doku_direct_payment(Api $api, Payload $payload): array
{
    $payment = new Payment($api);

    return $payment->directPayment($payload);
}

function doku_generate_pay_code(Api $api, Payload $payload): array
{
    $payment = new Payment($api);

    return $payment->generatePayCode($payload);
}
