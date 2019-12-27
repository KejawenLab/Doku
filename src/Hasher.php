<?php

declare(strict_types=1);

namespace KejawenLab\PaymentGateway\Doku;

/**
 * @author Muhamad Surya Iksanudin <surya.iksanudin@gmail.com>
 */
class Hasher
{
    private $api;

    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    public function hashWords(array $payload): string
    {
        return sha1($this->rawWords($payload));
    }

    public function rawWords(array $payload): string
    {
        $deviceId = $payload['device_id'] ?? null;
        $pairingCode = $payload['pairing_code'] ?? null;
        $currency = $payload['currency'] ?? null;
        $resultMsg = $payload['resultmsg'] ?? null;
        $eduStatus = $payload['edustatus'] ?? null;

        $commonWords = sprintf('%s%s%s%s', $payload['amount'], $this->api->getMallId(), $this->api->getSharedKey(), $payload['invoice']);

        if ($deviceId) {
            $deviceIdWords = sprintf('%s%s', $commonWords, $currency);

            if ($pairingCode) {
                return sprintf('%s%s%s%s', $deviceIdWords, $payload['token'], $pairingCode, $deviceId);
            }

            return sprintf('%s%s', $deviceIdWords, $deviceId);
        }

        if ($pairingCode) {
            return sprintf('%s%s%s%s', $commonWords, $currency, $payload['token'], $pairingCode);
        }

        if ($currency) {
            return sprintf('%s%s', $commonWords, $currency);
        }

        if ($resultMsg && $eduStatus) {
            return sprintf('%s%s%s', $commonWords, $resultMsg, $eduStatus);
        }

        return $commonWords;
    }
}
