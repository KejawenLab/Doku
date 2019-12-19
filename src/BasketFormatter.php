<?php

declare(strict_types=1);

namespace KejawenLab\PaymentGateway\Doku;

/**
 * @author Muhamad Surya Iksanudin <surya.iksanudin@gmail.com>
 */
class BasketFormatter
{
    public static function format(array $items): string
    {
        $basket = '';
        foreach ($items as $item) {
            $basket .= sprintf('%s,%s,%s,%s;', $item['name'], $item['amount'], $item['quantity'], $item['subtotal']);
        }

        return $basket;
    }
}
