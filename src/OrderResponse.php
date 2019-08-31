<?php


namespace App;


class OrderResponse
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $created_at;

    /**
     * @var bool
     */
    private $delivery_needed;

    /**
     * @var array
     */
    private $merchant;

    /**
     * @var string
     */
    private $collector;

    /**
     * @var int
     */
    private $amount_cents;

    /**
     * @var array
     */
    private $shipping_data;

    /**
     * @var string
     */
    private $shipping_details;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var bool
     */
    private $is_payment_locked;

    /**
     * @var bool
     */
    private $is_return;

    /**
     * @var bool
     */
    private $is_cancel;

    /**
     * @var bool
     */
    private $is_returned;

    /**
     * @var bool
     */
    private $is_canceled;

    /**
     * @var string
     */
    private $merchant_order_id;

    /**
     * @var string
     */
    private $wallet_notification;

    /**
     * @var string
     */
    private $paid_amount_cents;

    /**
     * @var string
     */
    private $notify_user_with_email;

    /**
     * @var array
     */
    private $items;

    /**
     * @var string
     */
    private $order_url;

    /**
     * @var string
     */
    private $commission_fees;

    /**
     * @var string
     */
    private $delivery_fees_cents;

    /**
     * @var string
     */
    private $payment_method;

    /**
     * @var string
     */
    private $merchant_staff_tag;

    /**
     * @var string
     */
    private $api_source;

    /**
     * @var string
     */
    private $pickup_data;

    /**
     * @var string
     */
    private $delivery_status;

    /**
     * @var string
     */
    private $token;

    /**
     * @var string
     */
    private $url;

    /**
     * OrderResponse constructor.
     *
     * @param \stdClass $data
     */
    public function __construct(\stdClass $data)
    {
        foreach($data as $property => $value) {
            if (property_exists($this, $property)) {
                $this->{$property} = $value;
            }
        }
    }

    /**
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->id;
    }
}