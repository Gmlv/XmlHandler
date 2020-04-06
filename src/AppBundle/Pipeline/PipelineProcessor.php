<?php

namespace AppBundle\Pipeline;

use AppBundle\Pipeline\Interfaces\PipelineInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\DependencyInjection\ContainerInterface;

class PipelineProcessor
{
    /** @var ArrayCollection $pipelines */
    private $pipelines;

    /** @var  Context $context*/
    private $context;

    /** @var  ContainerInterface $container */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->pipelines = new ArrayCollection();
    }

    public function add($pipe)
    {
        $this->pipelines->add($pipe);

        return $this;
    }

    public function process()
    {
        /** @var PipelineInterface $pipeline */
        foreach ($this->pipelines as $pipeline) {
            $return = $this->container->get($pipeline)->execute($this->context);
            $this->context = $return;
        }

        return $this->context;
    }

    public function createContext(\SimpleXMLElement $xml)
    {
        $context = new Context();
        $context->setXml($xml);

        $this->context = $context;
    }

    public function clearPipeline()
    {
        $this->pipelines = new ArrayCollection();
    }
}
