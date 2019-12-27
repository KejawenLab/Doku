<?php

declare(strict_types=1);

namespace KejawenLab\PaymentGateway\Doku;

/**
 * @author Muhamad Surya Iksanudin <surya.iksanudin@gmail.com>
 */
class Payment
{
    private $api;

    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    public function prePayment(Payload $payload): array
    {
        $payload->merge([
            'req_mall_id' => $this->api->getMallId(),
        ]);

        return $this->request($this->api->getPrePaymentUrl(), $payload->jsonData());
    }

    public function payment(Payload $payload): array
    {
        $payload->merge([
            'req_mall_id' => $this->api->getMallId(),
        ]);

        return $this->request($this->api->getPaymentUrl(), $payload->jsonData());
    }

    public function directPayment(Payload $payload): array
    {
        $payload->merge([
            'req_mall_id' => $this->api->getMallId(),
        ]);

        return $this->request($this->api->getDirectPaymentUrl(), $payload->jsonData());
    }

    public function generatePayCode(Payload $payload): array
    {
        $payload->merge([
            'req_mall_id' => $this->api->getMallId(),
        ]);

        return $this->request($this->api->getGenerateVACodeUrl(), $payload->jsonData());
    }

    private function request(string $url, string $payload): array
    {
        file_put_contents('/tmp/doku_request.log', $payload, FILE_APPEND | LOCK_EX);

        $ch = curl_init($this->api->getPrePaymentUrl());
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, sprintf('data=%s', $payload));
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $jsonResponse = curl_exec($ch);

        file_put_contents('/tmp/doku_response.log', $jsonResponse, FILE_APPEND | LOCK_EX);

        curl_close($ch);

        return json_decode($jsonResponse, true);
    }
}
