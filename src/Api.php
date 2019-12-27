<?php

declare(strict_types=1);

namespace KejawenLab\PaymentGateway\Doku;

/**
 * @author Muhamad Surya Iksanudin <surya.iksanudin@gmail.com>
 */
class Api
{
    private const SANDBOX_PRE_PAYMENT_URL = 'http://staging.doku.com/api/payment/PrePayment';
    private const SANDBOX_PAYMENT_URL = 'http://staging.doku.com/api/payment/paymentMip';
    private const SANDBOX_DIRECT_PAYMENT_URL = 'http://staging.doku.com/api/payment/PaymentMIPDirect';
    private const SANDBOX_GENERATE_CODE_URL = 'http://staging.doku.com/api/payment/DoGeneratePaycodeVA';

    private const PRE_PAYMENT_URL = 'https://pay.doku.com/api/payment/PrePayment';
    private const PAYMENT_URL = 'https://pay.doku.com/api/payment/paymentMip';
    private const DIRECT_PAYMENT_URL = 'https://pay.doku.com/api/payment/PaymentMIPDirect';
    private const GENERATE_CODE_URL = 'https://pay.doku.com/api/payment/DoGeneratePaycodeVA';

    private $mallId;
    private $sharedKey;
    private $isProduction = false;

    public function __construct(string $mallId, string $sharedKey, bool $isProduction = false)
    {
        $this->mallId = $mallId;
        $this->sharedKey = $sharedKey;
        $this->isProduction = $isProduction;
    }

    public function getMallId(): string
    {
        return $this->mallId;
    }

    public function getSharedKey(): string
    {
        return $this->sharedKey;
    }

    public function getPrePaymentUrl(): string
    {
        return $this->isProduction ? self::PRE_PAYMENT_URL : self::SANDBOX_PRE_PAYMENT_URL;
    }

    public function getPaymentUrl(): string
    {
        return $this->isProduction ? self::PAYMENT_URL : self::SANDBOX_PAYMENT_URL;
    }

    public function getDirectPaymentUrl(): string
    {
        return $this->isProduction ? self::DIRECT_PAYMENT_URL : self::SANDBOX_DIRECT_PAYMENT_URL;
    }

    public function getGenerateVACodeUrl(): string
    {
        return $this->isProduction ? self::GENERATE_CODE_URL : self::SANDBOX_GENERATE_CODE_URL;
    }
}
