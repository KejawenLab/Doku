<?php

declare(strict_types=1);

namespace KejawenLab\PaymentGateway\Doku;

/**
 * @author Muhamad Surya Iksanudin <surya.iksanudin@gmail.com>
 */
class Customer
{
    private $name;
    private $email;
    private $phoneNumber;
    private $address;

    public function __construct(string $name, string $email, string $phoneNumber, string $address)
    {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \RuntimeException(sprintf('"%s" is not valid email address.', $email));
        }

        $this->name = $name;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->address = $address;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'data_email' => $this->email,
            'data_phone' => $this->phoneNumber,
            'data_address' => $this->address,
        ];
    }
}
