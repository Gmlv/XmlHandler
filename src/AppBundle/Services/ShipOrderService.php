<?php

namespace AppBundle\Services;

use AppBundle\Entity\Entity\ShipOrder;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityManagerInterface;

class ShipOrderService
{
    /** @var  EntityManagerInterface $entityManager */
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function save(Collection $shipOrderList)
    {
        /** @var ShipOrder $people */
        foreach ($shipOrderList as $shipOrder) {
            $this->entityManager->persist($shipOrder);
        }

        $this->entityManager->flush();
    }
}
