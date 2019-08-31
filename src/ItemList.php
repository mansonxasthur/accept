<?php


namespace MX13\Accept;


class ItemList
{
    /**
     * @var Item
     */
    private $items;

    public function setItems(array $items): ItemList
    {
        $this->items = $items;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        $total = 0;
        foreach ($this->items as $item){
            $total += $item->getTotal();
        }

        return $total;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $items = [];
        foreach ($this->items as $item) {
            $items[] = $item->toArray();
        }

        return $items;
    }
}