<?php

require __DIR__.'/../Guzzle/autoloader.php';
require __DIR__.'/Api.php';
require __DIR__.'/BasketFormatter.php';
require __DIR__.'/Billing.php';
require __DIR__.'/Hasher.php';
require __DIR__.'/PaymentChannel.php';
require __DIR__.'/Payment/PaymentInterface.php';
require __DIR__.'/Payment/BankTransfer.php';

use KejawenLab\PaymentGateway\Doku\Api;
use KejawenLab\PaymentGateway\Doku\Billing;
use KejawenLab\PaymentGateway\Doku\Payment\BankTransfer;

function bank_transfer(Billing $billing)
{
    $api = new Api(false);
    $bankTransfer = new BankTransfer($api);
    $bankTransfer->pay($billing);
}
