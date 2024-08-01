<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SensorsController extends AbstractController{

    #[Route('/sensors/list', name:'sensors_list')]
    
    public function list(){
        $response = new Response();
        $response->setContent('<div>Hola mundo</div>');
        return $response;
    }
}