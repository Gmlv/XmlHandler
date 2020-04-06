<?php

namespace AppBundle\Factory;

use AppBundle\Factory\Interfaces\XmlHandlerInterface;
use AppBundle\Pipeline\PipelineProcessor;
use AppBundle\Pipeline\ShipOrder\ShipOrderId;
use AppBundle\Pipeline\ShipOrder\ShipOrderItems;
use AppBundle\Pipeline\ShipOrder\ShipOrderPerson;
use AppBundle\Pipeline\ShipOrder\ShipOrderShipTo;
use Doctrine\Common\Collections\ArrayCollection;

class ShipOrdersXmlHandler implements XmlHandlerInterface
{
    /** @var  \SimpleXMLElement $xml */
    private $xml;

    /** @var  PipelineProcessor $pipelineProcessor */
    private $pipelineProcessor;

    public function __construct(PipelineProcessor $pipelineProcessor)
    {
        $this->pipelineProcessor = $pipelineProcessor;
    }

    public function handle()
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
            ->add(ShipOrderId::class)
            ->add(ShipOrderPerson::class)
            ->add(ShipOrderShipTo::class)
            ->add(ShipOrderItems::class);
    }

    /**
     * @param \SimpleXMLElement $xml
     */
    public function setXml(\SimpleXMLElement $xml)
    {
        $this->xml = $xml;
    }
}
