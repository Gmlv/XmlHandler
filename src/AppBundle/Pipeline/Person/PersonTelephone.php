<?php

namespace AppBundle\Pipeline\Person;

use AppBundle\Entity\Entity\Person;
use AppBundle\Pipeline\Context;
use AppBundle\Pipeline\Interfaces\PipelineInterface;

class PersonTelephone implements PipelineInterface
{
    public function execute(Context $context)
    {
        /** @var Person $person */
        $person = $context->getEntity();
        $xml = $context->getXml();

        $telephones = [];

        if (!empty($xml->phones->phone)) {
            foreach ($xml->phones->phone as $phone) {
                $telephones[] = (string) $phone;
            }

            $person->setPhones($telephones);
        }

        return $context;
    }
}
