<?php

namespace AppBundle\Pipeline\Person;

use AppBundle\Entity\Entity\Person;
use AppBundle\Pipeline\Context;
use AppBundle\Pipeline\Interfaces\PipelineInterface;

/**
 * Class PersonName
 * @package AppBundle\Pipeline\Person
 */
class PersonName implements PipelineInterface
{
    /**
     * @param Context $context
     */
    public function execute(Context $context)
    {
        /** @var Person $entity */
        $entity = $context->getEntity();
        $xml = $context->getXml();
        $entity->setName((string) $xml->personname);

        return $context;
    }
}
