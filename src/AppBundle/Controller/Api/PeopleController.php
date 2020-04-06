<?php

namespace AppBundle\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class PeopleController extends Controller
{
    /**
     * @Route("api/people", name="api_people_list" , methods={"GET"})
     */
    public function getPeopleAction()
    {
        $people = $this->get('people_retrieve_service')->findAll();

        $response = new JsonResponse($people);

        return $response;
    }

    /**
     * @Route("api/people/{id}", name="api_people_id" , methods={"GET"})
     */
    public function getPeopleIdAction(int $id)
    {
        $people = $this->get('people_retrieve_service')->findById($id);

        $response = new JsonResponse($people);

        return $response;
    }
}
