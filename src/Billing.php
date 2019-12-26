<?php

declare(strict_types=1);

namespace KejawenLab\PaymentGateway\Doku;


/**
 * @author Muhamad Surya Iksanudin <surya.iksanudin@gmail.com>
 */
class Billing
{
    private $payload;

    private $channel;

    public function __construct(array $payload, string $channel = null)
    {
        $this->payload =  $payload;
        $this->channel = $channel;
    }

    public function getPayload(): array
    {
        return $this->payload;
    }

    public function getChannel(): string
    {
        return $this->channel;
    }
}
