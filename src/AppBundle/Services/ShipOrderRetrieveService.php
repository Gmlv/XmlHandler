<?php

namespace AppBundle\Services;

use AppBundle\Entity\Entity\ShipOrder;
use Doctrine\ORM\EntityManagerInterface;

class ShipOrderRetrieveService
{
    /** @var  EntityManagerInterface $entityManager */
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function findAll()
    {
        return $this->entityManager->getRepository(ShipOrder::class)->findAll();
    }

    public function findById(int $id)
    {
        return $this->entityManager->getRepository(ShipOrder::class)->find($id);
    }
}
