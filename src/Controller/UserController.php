<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\ORM\EntityManagerInterface;
use Nelmio\ApiDocBundle\Annotation as nelmio;
use OpenApi\Attributes as OA;

#[Route('/user',name:'user')]
#[nelmio\Areas(['internal'])]
#[OA\Tag('Controllers')]
class UserController extends AbstractController{
    
    #[Route('/register',name:'user_register',methods: ['POST'])]
    public function registerUser(EntityManagerInterface $entityManager, Request $request, UserPasswordHasherInterface $passwordHasher):Response{
        
        $body = $request->getContent();
        $data = json_decode($body, true);

        $user = new User();


        $user->setName($data['name']);
        $user->setSurname1($data['surname1']);
        $user->setSurname2($data['surname2']);
        $user->setEmail($data['email']);

        #$hashedPassword=$passwordHasher->hashPassword($user,$data['password']);

        $user->setPassword($data["password"]);

        $entityManager->persist($user);
        $entityManager->flush();

        return $this->json('User created successfully',Response::HTTP_CREATED);
}
}
