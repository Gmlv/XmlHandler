<?php

namespace AppBundle\Pipeline\Person;

use AppBundle\Entity\Entity\Person;
use AppBundle\Pipeline\Context;
use AppBundle\Pipeline\Interfaces\PipelineInterface;

class PersonId implements PipelineInterface
{
    public function execute(Context $context)
    {
        $xml = $context->getXml();
        $person = new Person();
        $person->setId((int) $xml->personid);
        $context->setEntity($person);

        return $context;
    }
}
