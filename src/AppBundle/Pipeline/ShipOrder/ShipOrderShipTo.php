<?php

namespace AppBundle\Pipeline\ShipOrder;

use AppBundle\Entity\Entity\ShipOrder;
use AppBundle\Pipeline\Context;
use AppBundle\Pipeline\Interfaces\PipelineInterface;

class ShipOrderShipTo implements PipelineInterface
{
    public function execute(Context $context)
    {
        $xml = $context->getXml();
        $shipTo = $xml->shipto;

        /** @var ShipOrder $entity */
        $entity = $context->getEntity();
        $entity->setShipToName((string) $shipTo->name);
        $entity->setAddress((string) $shipTo->address);
        $entity->setCity((string) $shipTo->city);
        $entity->setCountry((string) $shipTo->country);

        return $context;
    }
}
