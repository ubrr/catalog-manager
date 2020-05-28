<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use phpDocumentor\Reflection\Types\Null_;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AbstractController
{
    /**
     * @Route("/api/auth/register", name="auth_register")
     */
    public function register(LoggerInterface $loger, Request $request)
    {
        $body = json_decode($request->getContent(), true);
        $userEmail = $body["email"];
        $userPassword = $body["password"];
        $entityManager = $this->getDoctrine()->getManager();
        
        $repository =  $this->getDoctrine()
            ->getRepository(User::class)
            ->findOneByEmail($userEmail);

        // $loger->info(print_r($repository));
        $response = new Response();
        if($repository==NULL){
            $user = new User();
            $user->setEmail($userEmail);
            $user->setPassword($userPassword);
            $entityManager->persist($user);
            $entityManager->flush();
            $response->setContent(json_encode([
                'message' => "Пользователь создан" 
        ]));
        }
        else{
            $response->setContent(json_encode([
                'message' => "Пользователь такой есть" 
            ]));
        }
        // print_r($body);    
        // $response->setContent(json_encode([
        //     'data' => "1"
        // ]));
        // $response->headers->set('Content-Type', 'application/json');
        
        return $response;
    }
    /**
     * @Route("/api/auth/login", name="auth_login")
     */
    public function login(Request $request)
    {
        $body = json_decode($request->getContent(), true);
        $userEmail = $body["email"];
        $userPassword = $body["password"];
        $entityManager = $this->getDoctrine()->getManager();
        
        $repository =  $this->getDoctrine()
            ->getRepository(User::class)
            ->findOneByEmail($userEmail);
       
    }
}