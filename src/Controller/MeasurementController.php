<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\WineMeasurements;
use App\Repository\WineRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/measurement',name:'measurement')]

class MeasurementController extends AbstractController{

    
    #[Route('/register',name:'measurement_register', methods: ['POST'])]
    public function registerMeasurement(EntityManagerInterface $entityManager, Request $request):Response{
        
        $body = $request->getContent();
        $data = json_decode($body, true);

        $measurement = new WineMeasurements();

        # Unable to get parameters from foreign keys
        #$measurement->setSensorID(1);
        #$measurement->setWineID(1);

        $measurement->setYear(1945);
        $measurement->setColor('Red');
        $measurement->setTemperature(25);
        $measurement->setAlcoholContent(20);
        $measurement->setPH(7);
        
        $entityManager->persist($measurement);
        $entityManager->flush();

        return $this->json('User created successfully',Response::HTTP_CREATED);
}
}