<?php

declare(strict_types=1);

namespace KejawenLab\PaymentGateway\Doku;

use KejawenLab\PaymentGateway\Doku\Customer;
use KejawenLab\PaymentGateway\Doku\Item;
use KejawenLab\PaymentGateway\Doku\TransactionId;

/**
 * @author Muhamad Surya Iksanudin <surya.iksanudin@gmail.com>
 */
class Payload
{
    private $hasher;
    private $data;

    public function __construct(Hasher $hasher)
    {
        $this->hasher = $hasher;
    }

    public function setData(TransactionId $transactionId, Customer $customer, array $items, int $currency = 360, string $chainMerchant = 'NA', string $channel = null, array $params = [])
    {
        $total = 0.0;
        $basket = '';
        /** @var Item $item */
        foreach ($items as $item) {
            $total += $item->getSubTotal();
            $basket .= $item->basketFormat();
        }

        $words = $this->hasher->hashWords([
            'amount' => $total,
            'invoice' => $transactionId->getValue(),
            'currency' => $currency,
        ]);

        if ($channel && PaymentChannel::valid($channel)) {
            $this->data['req_payment_channel'] = $channel;
        }

        $this->data['req_chain_merchant'] = $chainMerchant;
        $this->data['req_amount'] = $total;
        $this->data['req_words'] = $words;
        $this->data['req_trans_id_merchant'] = $transactionId->getValue();
        $this->data['req_purchase_amount'] = $total;
        $this->data['req_request_date_time'] = date('YmdHis');
        $this->data['req_session_id'] = sha1($this->data['req_request_date_time']);
        $this->data['req_email'] = $customer->getEmail();
        $this->data['req_name'] = $customer->getName();
        $this->data['req_address'] = $customer->getAddress();
        $this->data['req_mobile_phone'] = $customer->getPhoneNumber();
        $this->data['req_basket'] = $basket;
    }

    public function merge(array $params): void
    {
        $this->data = array_merge($params, $this->data);
    }

    public function arrayData(): array
    {
        return $this->data;
    }

    public function jsonData(): string
    {
        return json_encode($this->data);
    }
}
