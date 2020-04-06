<?php

namespace AppBundle\Entity\Entity;

use Doctrine\Common\Collections\Collection;

class ShipOrder implements \JsonSerializable
{
    private $id;

    /** @var  Person $person */
    private $person;

    /** @var string $shipToName  */
    private $shipToName;

    /** @var  string $address */
    private $address;

    /** @var  string $city */
    private $city;

    /** @var  string $country */
    private $country;

    /** @var  Collection */
    private $items;

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
     * @return Person
     */
    public function getPerson(): Person
    {
        return $this->person;
    }

    /**
     * @param Person $person
     */
    public function setPerson(Person $person)
    {
        $this->person = $person;
    }

    /**
     * @return Collection
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    /**
     * @param Collection $items
     */
    public function setItems(Collection $items)
    {
        $this->items = $items;
    }

    /**
     * @return string
     */
    public function getShipToName(): string
    {
        return $this->shipToName;
    }

    /**
     * @param string $shipToName
     */
    public function setShipToName(string $shipToName)
    {
        $this->shipToName = $shipToName;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country)
    {
        $this->country = $country;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->getId() ,
            'shipToName' => $this->getShipToName() ,
            'shipToAddress' => $this->getAddress() ,
            'shipToCity' => $this->getCity() ,
            'shipToCountry' => $this->getCountry() ,
            'items' => $this->getItems()->toArray()
        ];
    }
}
