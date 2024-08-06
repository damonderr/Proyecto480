<?php

namespace App\Controller;

use App\Entity\Sensor;
use App\Repository\SensorRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Route;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\OrderBy;





#[Route('/sensor', name:'sensor')]
class SensorsController extends AbstractController{

    #[Route('/register',name:'sensor_register',methods: ['POST'])]
    public function registerSensor(EntityManagerInterface $entityManager, Request $request): Response{

        $body = $request->getContent();
        $data = json_decode($body, true);

        $sensor = new Sensor();

        $sensor->setName($data['name']);

        $entityManager->persist($sensor);
        $entityManager->flush();

        return $this->json('Sensor created successfully',Response::HTTP_CREATED);
    }

    #[Route('/get', name:'getSensors_ordered',methods: ['GET'])]
   public function getSensor(SensorRepository $sensorRepo): Response{
    
    $sensorList = $sensorRepo->findBy(['name'=> $this->getParameter('name')]);
    
   return $this->json($sensorList,Response::HTTP_OK,);
   
}}