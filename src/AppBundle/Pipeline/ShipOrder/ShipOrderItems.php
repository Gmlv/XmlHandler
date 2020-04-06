<?php

namespace AppBundle\Pipeline\ShipOrder;

use AppBundle\Entity\Entity\Item;
use AppBundle\Entity\Entity\ShipOrder;
use AppBundle\Pipeline\Context;
use AppBundle\Pipeline\Interfaces\PipelineInterface;
use Doctrine\Common\Collections\ArrayCollection;

class ShipOrderItems implements PipelineInterface
{
    public function execute(Context $context)
    {
        /** @var ShipOrder $entity */
        $entity = $context->getEntity();
        $xml = $context->getXml();

        $itensList = new ArrayCollection();

        if (!empty($xml->items)) {
            foreach ($xml->items->item as $itemXml) {
                $item = new Item();
                $item->setTitle((string) $itemXml->title);
                $item->setNote((string) $itemXml->note);
                $item->setQuantity((int) $itemXml->quantity);
                $item->setPrice((float) $itemXml->price);

                $itensList->add($item);
            }
        }

        $entity->setItems($itensList);

        return $context;
    }
}
