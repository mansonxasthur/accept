<?php


namespace MX13\Accept;


class Payment
{
    const PAYMENT_KEY_URI = 'acceptance/payment_keys';
    /**
     * @var ApiContext
     */
    private $apiContext;

    /**
     * @var Amount
     */
    private $amount;

    /**
     * @var ItemList
     */
    private $items;

    /**
     * @var bool
     */
    private $deliveryNeeded = false;

    /**
     * @var string
     */
    private $merchantOrderId;

    /**
     * @var int
     */
    private $expiration = 3600;

    /**
     * @var BillingData
     */
    private $billingData;

    /**
     * @var OrderResponse
     */
    private $orderResponse;

    /**
     * @var string
     */
    private $paymentKey;

    /**
     * Payment constructor.
     *
     * @param ApiContext $apiContext
     */
    public function __construct(ApiContext $apiContext)
    {
        $this->apiContext = $apiContext;
    }

    /**
     * @param Amount $amount
     *
     * @return Payment
     */
    public function setAmount(Amount $amount): Payment
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @param int $expiration
     *
     * @return Payment
     */
    public function setExpiration(int $expiration): Payment
    {
        $this->expiration = $expiration;
        return $this;
    }

    /**
     * @param BillingData $billingData
     *
     * @return Payment
     */
    public function setBillingData(BillingData $billingData): Payment
    {
        $this->billingData = $billingData;
        return $this;
    }

    /**
     * @param ItemList $itemList
     *
     * @return Payment
     */
    public function setItems(ItemList $itemList): Payment
    {
        $this->items = $itemList;
        return $this;
    }

    /**
     * @param bool $deliveryNeeded
     *
     * @return Payment
     */
    public function setDeliveryNeeded(bool $deliveryNeeded): Payment
    {
        $this->deliveryNeeded = $deliveryNeeded;
        return $this;
    }

    /**
     * @param string $merchantOrderId
     *
     * @return Payment
     */
    public function setMerchantOrderId(string $merchantOrderId): Payment
    {
        $this->merchantOrderId = $merchantOrderId;
        return $this;
    }

    /**
     * @return Amount
     */
    public function getAmount(): Amount
    {
        return $this->amount;
    }

    /**
     * @return int
     */
    public function getExpiration(): int
    {
        return $this->expiration;
    }

    /**
     * @return BillingData
     */
    public function getBillingData(): BillingData
    {
        return $this->billingData;
    }

    /**
     * @return OrderResponse
     */
    public function getOrderResponse(): OrderResponse
    {
        if ($this->orderResponse === null) {
            $orderRequest = new OrderRequest();
            $orderRequest->setItems($this->getItems())
                ->setAmount($this->getAmount())
                ->setDeliveryNeeded($this->getDeliveryNeeded())
                ->setMerchantOrderId($this->getMerchantOrderId());

            $this->orderResponse = $orderRequest->execute($this->apiContext);
        }
        return $this->orderResponse;
    }

    /**
     * @return string
     */
    public function getPaymentKey(): ?string
    {
        return $this->paymentKey;
    }

    /**
     * @return bool
     */
    public function getDeliveryNeeded(): bool
    {
        return $this->deliveryNeeded;
    }

    /**
     * @return ItemList
     */
    public function getItems(): ItemList
    {
        return $this->items;
    }

    /**
     * @return string
     */
    public function getMerchantOrderId(): string
    {
        return $this->merchantOrderId;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'amount_cents' => $this->getAmount()->getAmountCents(),
            'expiration' => $this->expiration,
            'billing_data' => $this->getBillingData()->toArray(),
            'order_id' => $this->getOrderResponse()->getOrderId(),
            'currency' => $this->getAmount()->getCurrency(),
            'integration_id' => $this->apiContext->getIntegrationId(),
        ];
    }

    public function execute()
    {
        $result = $this->apiContext->getData($this->toArray(), self::PAYMENT_KEY_URI);
        $this->paymentKey = $result->token;
    }

    public function getIframeUrl(): ?string
    {
        if ($this->getPaymentKey() !== null && !empty($this->getPaymentKey())) {
            return $this->generateIframeUrl($this->apiContext->getIframeId(), $this->getPaymentKey());
        }

        return null;
    }

    private function generateIframeUrl(string $iframeId, string $paymentKey): string
    {
        return "https://accept.paymobsolutions.com/api/acceptance/iframes/{$iframeId}?payment_token={$paymentKey}";
    }
}