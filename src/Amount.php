<?php


namespace App;


class Amount
{
    private $amount_cents;
    private $currency;

    /**
     * @param int $amountCents
     *
     * @return Amount
     */
    public function setAmountCents(int $amountCents): Amount
    {
        $this->amount_cents = $amountCents;
        return $this;
    }

    /**
     * @param string $currency
     *
     * @return Amount
     */
    public function setCurrency(string $currency): Amount
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @return int
     */
    public function getAmountCents(): int
    {
        return $this->amount_cents;
    }
}