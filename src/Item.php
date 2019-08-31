<?php


namespace App;


class Item
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var int
     */
    private $amount_cents;

    /**
     * @var int
     */
    private $quantity;

    /**
     * @param string $name
     *
     * @return Item
     */
    public function setName(string $name): Item
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $description
     *
     * @return Item
     */
    public function setDescription(string $description): Item
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param int $amountCents
     *
     * @return Item
     */
    public function setAmountCents(int $amountCents): Item
    {
        $this->amount_cents = $amountCents;
        return $this;
    }

    /**
     * @param int $quantity
     *
     * @return Item
     */
    public function setQuantity(int $quantity): Item
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getAmountCents(): int
    {
        return $this->amount_cents;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->getAmountCents() * $this->getQuantity();
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name'         => $this->getName(),
            'description'  => $this->getDescription(),
            'amount_cents' => $this->getAmountCents(),
            'quantity'     => $this->getQuantity(),
        ];
    }
}