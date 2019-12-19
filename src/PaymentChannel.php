<?php

declare(strict_types=1);

namespace KejawenLab\PaymentGateway\Doku;

/**
 * @author Muhamad Surya Iksanudin <surya.iksanudin@gmail.com>
 */
class PaymentChannel
{
    public const MANDIRI_CLICKPAY = '02';
    public const KLIK_BCA = '03';
    public const DOKU_WALLET = '04';
    public const BRI_EPAY = '06';
    public const CREDIT_CARD = '15';
    public const CREDIT_CARD_TOKENINATION = '16';
    public const RECURRING_PAYMENT = '17';
    public const BCA_KLIKPAY = '18';
    public const CIMB_CLICKS = '19';
    public const SINARMAS_VA = '22';
    public const MOTO = '23';
    public const MUAMALAT_IB = '25';
    public const DANAMON_IB = '26';
    public const PERMATA_IB = '28';
    public const BCA_VA = '29';
    public const INDOMARET = '31';
    public const CIMB_VA = '32';
    public const DANAMON_VA = '33';
    public const BRI_VA = '34';
    public const ALFA_VA = '35';
    public const PERMATA_VA = '36';
    public const KREDIVO = '37';
    public const BNI_VA = '38';
    public const LINEPAY_ECASH = '39';
    public const MANDIRI_VA = '41';
    public const QNB_VA = '42';
    public const BTN_VA = '43';
    public const MAYBANK_VA = '44';
    public const BNI_YAP = '45';
    public const ARTHA_VA = '47';

    public static function validateChannel(string $channel): bool
    {
        if (in_array($channel, self::availableChannels())) {
            return true;
        }

        return false;
    }

    public static function availableChannels(): array
    {
        return [
            self::MANDIRI_CLICKPAY,
            self::KLIK_BCA,
            self::DOKU_WALLET,
            self::BRI_EPAY,
            self::CREDIT_CARD,
            self::CREDIT_CARD_TOKENINATION,
            self::RECURRING_PAYMENT,
            self::BCA_KLIKPAY,
            self::CIMB_CLICKS,
            self::SINARMAS_VA,
            self::MOTO,
            self::MUAMALAT_IB,
            self::DANAMON_IB,
            self::PERMATA_IB,
            self::BCA_VA,
            self::INDOMARET,
            self::CIMB_VA,
            self::DANAMON_VA,
            self::BRI_VA,
            self::ALFA_VA,
            self::PERMATA_VA,
            self::KREDIVO,
            self::BNI_VA,
            self::LINEPAY_ECASH,
            self::MANDIRI_VA,
            self::QNB_VA,
            self::BTN_VA,
            self::MAYBANK_VA,
            self::BNI_YAP,
            self::ARTHA_VA,
        ];
    }
}
