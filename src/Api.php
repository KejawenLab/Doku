<?php

declare(strict_types=1);

namespace KejawenLab\PaymentGateway\Doku;

/**
 * @author Muhamad Surya Iksanudin <surya.iksanudin@gmail.com>
 */
class Api
{
    public const MALL_ID = '11115699';
    public const SHARED_KEY = 'eXka8Oo93UAj';

    private const SANDBOX_PRE_PAYMENT_URL = 'http://staging.doku.com/api/payment/PrePayment';
    private const SANDBOX_PAYMENT_URL = 'http://staging.doku.com/api/payment/paymentMip';
    private const SANDBOX_DIRECT_PAYMENT_URL = 'http://staging.doku.com/api/payment/PaymentMIPDirect';
    private const SANDBOX_GENERATE_CODE_8DIGIT_URL = 'http://staging.doku.com/api/payment/DoGeneratePaycodeVA';
    private const SANDBOX_GENERATE_CODE_11DIGIT_URL = 'http://staging.doku.com/api/payment/doGeneratePaymentCode';

    private const PRE_PAYMENT_URL = 'https://pay.doku.com/api/payment/PrePayment';
    private const PAYMENT_URL = 'https://pay.doku.com/api/payment/paymentMip';
    private const DIRECT_PAYMENT_URL = 'https://pay.doku.com/api/payment/PaymentMIPDirect';
    private const GENERATE_CODE_8DIGIT_URL = 'https://pay.doku.com/api/payment/DoGeneratePaycodeVA';
    private const GENERATE_CODE_11DIGIT_URL = 'https://pay.doku.com/api/payment/doGeneratePaymentCode';

    private $isProduction = false;

    public function __construct(bool $isProduction = false)
    {
        $this->isProduction = $isProduction;
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

    public function getGenerate8DigitCodeUrl(): string
    {
        return $this->isProduction ? self::GENERATE_CODE_8DIGIT_URL : self::SANDBOX_GENERATE_CODE_8DIGIT_URL;
    }

    public function getGenerate11DigitCodeUrl(): string
    {
        return $this->isProduction ? self::GENERATE_CODE_11DIGIT_URL : self::SANDBOX_GENERATE_CODE_11DIGIT_URL;
    }
}
