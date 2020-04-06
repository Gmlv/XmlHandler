<?php

namespace AppBundle\Factory;

use AppBundle\Factory\Interfaces\XmlHandlerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class XmlHandlerFactory
 * @package AppBundle\Factory
 */
class XmlHandlerFactory
{
    /** @var  PeopleXmlHandler $peopleXmlHandler */
    private $peopleXmlHandler ;

    /** @var  ShipOrdersXmlHandler $shipOrdersXmlHandler */
    private $shipOrdersXmlHandler;

    public function __construct(PeopleXmlHandler $peopleXmlHandler, ShipOrdersXmlHandler $shipOrdersXmlHandler)
    {
        $this->peopleXmlHandler = $peopleXmlHandler;
        $this->shipOrdersXmlHandler = $shipOrdersXmlHandler;
    }

    /**
     * @param UploadedFile $file
     * @return XmlHandlerInterface
     */
    public function create(UploadedFile $file): XmlHandlerInterface
    {
        $xml = simplexml_load_string(file_get_contents($file->getRealPath()));

        if (isset($xml->person)) {
            $this->peopleXmlHandler->setXml($xml);

            return $this->peopleXmlHandler;
        } elseif (isset($xml->shiporder)) {
            $this->shipOrdersXmlHandler->setXml($xml);

            return $this->shipOrdersXmlHandler;
        }

        throw new \DomainException("File not Suported yet.");
    }
}
