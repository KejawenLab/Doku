<?php

declare(strict_types=1);

namespace KejawenLab\PaymentGateway\Doku;

/**
 * @author Muhamad Surya Iksanudin <surya.iksanudin@gmail.com>
 */
class Item
{
    private $name;
    private $amount;
    private $quantity;
    private $subTotal;

    public function __construct(string $name, float $amount, int $quantity)
    {
        $this->name = $name;
        $this->amount = $amount;
        $this->quantity = $quantity;
        $this->subTotal = $amount * $quantity;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getSubTotal(): float
    {
        return $this->subTotal;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'amount' => $this->amount,
            'quantity' => $this->quantity,
            'subtotal' => $this->subTotal,
        ];
    }

    public function basketFormat(): string
    {
        return sprintf('%s,%s,%s,%s;', $this->name, $this->amount, $this->quantity, $this->subTotal);
    }
}
