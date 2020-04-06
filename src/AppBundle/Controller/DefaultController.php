<?php

namespace AppBundle\Controller;

use AppBundle\Validator\FileValidator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Forms\FileForm;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage" , methods={"GET", "POST"})
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm(FileForm::class);
        try {
            $form->handleRequest($request);
            if ($form->isSubmitted()) {
                $data = $form->getData();

                /** @var UploadedFile $peopleFile */
                $peopleFile = $data['people'];

                /** @var UploadedFile $shipOrderFile */
                $shipOrderFile = $data['order'];

                FileValidator::validate($peopleFile);
                FileValidator::validate($shipOrderFile);

                $peopleFactory = $this->get('xml_handler_factory')->create($peopleFile);
                $peopleList = $peopleFactory->handle();
                $this->get("people_service")->save($peopleList);

                $shipOrderFactory = $this->get('xml_handler_factory')->create($shipOrderFile);
                $shipOrderList = $shipOrderFactory->handle();
                $this->get("ship_order_service")->save($shipOrderList);
                $message = 'Saved!';
            }
        } catch (\DomainException $domainException) {
            $message = $domainException->getMessage();
        } catch (\Throwable $throwable) {
            $message = 'An unexpected error ocurred';
        }

        if (isset($message)) {
            $this->get('session')->getFlashBag()->add('messages', $message);
        }

        return $this->render('default/index.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
