<?php
namespace AppBundle\Pipeline\ShipOrder;

use AppBundle\Entity\Entity\Person;
use AppBundle\Entity\Entity\ShipOrder;
use AppBundle\Pipeline\Context;
use AppBundle\Pipeline\Interfaces\PipelineInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class ShipOrderPerson implements PipelineInterface
{
    /** @var  EntityManagerInterface $entityManager */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function execute(Context $context)
    {
        /** @var ShipOrder $shipOrder */
        $shipOrder = $context->getEntity();
        $xml = $context->getXml();

        $person = $this->entityManager->getRepository(Person::class)->find((int) $xml->orderperson);
        $shipOrder->setPerson($person);

        return $context;
    }
}
