<?php

namespace AppBundle\Services;

use AppBundle\Entity\Entity\Person;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityManagerInterface;

class PeopleService
{
    /** @var  EntityManagerInterface $entityManager */
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function save(Collection $peopleList)
    {
        /** @var Person $people */
        foreach ($peopleList as $people) {
            $this->entityManager->persist($people);
        }

        $this->entityManager->flush();
    }
}
