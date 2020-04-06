<?php

namespace AppBundle\Entity\Entity;

class Item implements \JsonSerializable
{
    /** @var  int $id */
    private $id;

    /** @var  string $title */
    private $title;

    /** @var  string $note */
    private $note;

    /** @var  int $quantity */
    private $quantity;

    /** @var  float $price */
    private $price;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $prices
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'quantity' => $this->getQuantity(),
            'price' => $this->getPrice(),
            'note' => $this->getNote(),
            'title' => $this->getTitle(),
        ];
    }
}
