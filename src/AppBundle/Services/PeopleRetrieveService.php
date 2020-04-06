<?php

namespace AppBundle\Services;

use AppBundle\Entity\Entity\Person;
use Doctrine\ORM\EntityManagerInterface;

class PeopleRetrieveService
{
    /** @var  EntityManagerInterface $entityManager */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function findAll()
    {
        return $this->entityManager->getRepository(Person::class)->findAll();
    }

    public function findById(int $id)
    {
        return $this->entityManager->getRepository(Person::class)->find($id);
    }
}
