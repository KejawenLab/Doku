<?php

declare(strict_types=1);

namespace KejawenLab\PaymentGateway\Doku\Payment;

use GuzzleHttp\Client;
use KejawenLab\PaymentGateway\Doku\Api;
use KejawenLab\PaymentGateway\Doku\Billing;

/**
 * @author Muhamad Surya Iksanudin <surya.iksanudin@gmail.com>
 */
class BankTransfer implements PaymentInterface
{
    private $api;

    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    public function pay(Billing $billing): void
    {
        $client = new Client();
        $response = $client->post($this->api->getGenerateBankTransferCodeUrl(), [
            'form_params' => ['data' => json_encode($billing->getPayload())],
        ]);

        file_put_contents('/tmp/bannk_transfer.json', $response);
    }
}
