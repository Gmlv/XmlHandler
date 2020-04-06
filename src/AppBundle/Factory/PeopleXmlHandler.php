<?php

namespace AppBundle\Factory;

use AppBundle\Factory\Interfaces\XmlHandlerInterface;
use AppBundle\Pipeline\Context;
use AppBundle\Pipeline\Person\PersonId;
use AppBundle\Pipeline\Person\PersonName;
use AppBundle\Pipeline\Person\PersonTelephone;
use AppBundle\pipeline\PipelineProcessor;
use Doctrine\Common\Collections\ArrayCollection;

class PeopleXmlHandler implements XmlHandlerInterface
{
    private $xml;

    /** @var  PipelineProcessor */
    private $pipelineProcessor;

    public function __construct(PipelineProcessor $pipelineProcessor)
    {
        $this->pipelineProcessor = $pipelineProcessor;
    }

    public function handle(): ArrayCollection
    {
        $this->preparePipeline();
        $personList = new ArrayCollection();

        foreach ($this->xml as $xml) {
            $this->pipelineProcessor->createContext($xml);
            $context = $this->pipelineProcessor->process();
            $personList->add($context->getEntity());
        }

        return $personList;
    }

    private function preparePipeline()
    {
        $this->pipelineProcessor->clearPipeline();
        $this->pipelineProcessor
            ->add(PersonId::class)
            ->add(PersonName::class)
            ->add(PersonTelephone::class);
    }

    /**
     * @param \SimpleXMLElement $xml
     */
    public function setXml(\SimpleXMLElement $xml)
    {
        $this->xml = $xml;
    }
}
