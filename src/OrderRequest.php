<?php


namespace MX13\Accept;


class OrderRequest
{
    const ORDER_URI = 'ecommerce/orders';
    /**
     * @var ApiContext
     */
    private $apiContext;
    /**
     * @var bool
     */
    private $deliver_needed;

    /**
     * @var Amount
     */
    private $amount;

    /**
     * @var ItemList
     */
    private $items;

    /**
     * @var string
     */
    private $merchant_order_id;

    /**
     * @param bool $deliverNeeded
     *
     * @return OrderRequest
     */
    public function setDeliveryNeeded(bool $deliverNeeded): OrderRequest
    {
        $this->deliver_needed = $deliverNeeded;
        return $this;
    }

    /**
     * @param Amount $amount
     *
     * @return OrderRequest
     */
    public function setAmount(Amount $amount): OrderRequest
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @param ItemList $itemList
     *
     * @return OrderRequest
     */
    public function setItems(ItemList $itemList): OrderRequest
    {
        $this->items = $itemList;
        return $this;
    }

    /**
     * @param string $merchantOrderId
     *
     * @return OrderRequest
     */
    public function setMerchantOrderId(string $merchantOrderId): OrderRequest
    {
        $this->merchant_order_id = $merchantOrderId;
        return $this;
    }

    /**
     * @return bool
     */
    public function getDeliveryNeeded(): bool
    {
        return $this->deliver_needed;
    }

    /**
     * @return int
     */
    public function getAmountCents(): int
    {
        return $this->items->getTotal();
    }

    /**
     * @return ItemList
     */
    public function getItems(): ItemList
    {
        return $this->items;
    }

    public function getMerchantOrderId(): string
    {
        return $this->merchant_order_id;
    }

    public function toArray(): array
    {
        return [
            'delivery_needed'   => $this->deliver_needed,
            'merchant_id'       => $this->apiContext->getMerchantId(),
            'amount_cents'      => $this->amount->getAmountCents(),
            'currency'          => $this->amount->getCurrency(),
            'merchant_order_id' => $this->getMerchantOrderId(),
            'items'             => $this->items->toArray(),
        ];
    }

    public function execute(ApiContext $apiContext): OrderResponse
    {
        $this->apiContext = $apiContext;
        $result = $this->apiContext->getData($this->toArray(), self::ORDER_URI);

        return new OrderResponse($result);
    }
}