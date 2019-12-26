<?php

declare(strict_types=1);

namespace KejawenLab\PaymentGateway\Doku\Payment;

use KejawenLab\PaymentGateway\Doku\Billing;

/**
 * @author Muhamad Surya Iksanudin <surya.iksanudin@gmail.com>
 */
interface PaymentInterface
{
    public function pay(Billing $billing): void;
}
