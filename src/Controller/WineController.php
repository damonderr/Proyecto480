<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Wine;
use App\Repository\WineRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/wine',name:'wine')]

class WineController extends AbstractController{

    
    #[Route('/get',name:'wine_get', methods: ['GET'])]
    public function getWines(WineRepository $wineRepo, Request $request){
        
        $wines= $wineRepo->findAll();

        $wineList = array();

        foreach($wines as $wine){
            $wineList[] = [
                "name"=> $wine->getName(),
                "measurents"=> $wine->getProperties()
            ];
        }
        return $this->json($wineList);


    }
}
    
