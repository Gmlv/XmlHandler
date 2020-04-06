<?php

namespace AppBundle\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class ShipOrderController extends Controller
{
    /**
     * @Route("api/ship-order", name="api_ship_order_list" , methods={"GET"})
     */
    public function getShipOrderAction()
    {
        $shipOrders = $this->get('ship_order_retrieve_service')->findAll();

//        dump($shipOrders[0]->getItems());die;
        $response = new JsonResponse($shipOrders);

        return $response;
    }

    /**
     * @Route("api/ship-order/{id}", name="api_ship_order_id" , methods={"GET"})
     */
    public function getShipOrderIdAction(int $id)
    {
        $shipOrders = $this->get('ship_order_retrieve_service')->findById($id);

//        dump($shipOrders[0]->getItems());die;
        $response = new JsonResponse($shipOrders);

        return $response;
    }
}
