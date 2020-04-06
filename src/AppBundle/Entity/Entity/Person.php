<?php

namespace AppBundle\Entity\Entity;

use Doctrine\Common\Collections\Collection;

/**
 * Person
 */
class Person implements \JsonSerializable
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $phones;

    /** @var  Collection $shipOrders */
    private $shipOrders;


    /**
     * Get id
     *
     * @return int
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
     * Set name
     *
     * @param string $name
     *
     * @return Person
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set phones
     *
     * @param array $phones
     *
     * @return Person
     */
    public function setPhones($phones)
    {
        $this->phones = $phones;

        return $this;
    }

    /**
     * Get phones
     *
     * @return array
     */
    public function getPhones()
    {
        return $this->phones;
    }

    /**
     * @return Collection
     */
    public function getShipOrders(): Collection
    {
        return $this->shipOrders;
    }

    /**
     * @param Collection $shipOrders
     */
    public function setShipOrders(Collection $shipOrders)
    {
        $this->shipOrders = $shipOrders;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'phones' => $this->getPhones(),
            'shipOrders' => $this->getShipOrders()->toArray()
        ];
    }
}
