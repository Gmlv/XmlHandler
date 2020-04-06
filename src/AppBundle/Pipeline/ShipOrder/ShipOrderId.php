<?php

namespace AppBundle\Pipeline\ShipOrder;

use AppBundle\Entity\Entity\ShipOrder;
use AppBundle\Pipeline\Context;
use AppBundle\Pipeline\Interfaces\PipelineInterface;

class ShipOrderId implements PipelineInterface
{
    public function execute(Context $context)
    {
        $entity = new ShipOrder();
        $xml = $context->getXml();
        $entity->setId((int) $xml->orderid);

        $context->setEntity($entity);

        return $context;
    }
}
