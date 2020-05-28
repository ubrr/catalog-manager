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
use Namshi\JOSE\JWT;

class AuthController extends AbstractController
{
    /**
     * @Route("/api/auth/register", name="auth_register")
     */
    public function register(Request $request)
    {
        $reqBody = json_decode($request->getContent(), true);
        $userEmail = $reqBody["email"];
        $userPassword = $reqBody["password"];
        $entityManager = $this->getDoctrine()->getManager();

        $candidate =  $this->getDoctrine()
            ->getRepository(User::class)
            ->findOneByEmail($userEmail);

        $response = new Response();

        if ($candidate == NULL) {
            $user = new User();
            $user->setEmail($userEmail);
            $user->setPassword($userPassword);
            $entityManager->persist($user);
            $entityManager->flush();
            $response->setContent(json_encode([
                'message' => "Пользователь создан"
            ]));
        } else {
            $response->setContent(json_encode([
                'message' => "Такое имя пользователя уже есть"
            ]));
        }

        // $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/api/auth/login", name="auth_login")
     */
    public function login(LoggerInterface $logger,  Request $request)
    {
        $reqBody = json_decode($request->getContent(), true);
        $userEmail = $reqBody["email"];
        $userPassword = $reqBody["password"];
        $entityManager = $this->getDoctrine()->getManager();

        $candidate =  $this->getDoctrine()
            ->getRepository(User::class)
            ->findOneByEmail($userEmail);


        $response = new Response();
        // $response->setContent(json_encode([
        //     'data' => $candidate->getEmail()
        // ]));
        
        if ($candidate != NULL) {
            $token = array(
                 "data" => array(
                    "id" => $candidate->getId(),
                    
                    "email" => $candidate->getEmail()
                )
             );
             $key="supersecret";
            //  $jwt = JWT::encode($token, $key);
            // TODO: создаю token возвращаю токен
            $response->setContent(json_encode([
                'userId' => $candidate->getId(),
                'email'=> $candidate->getEmail(),
                'token'=> "123",

            ]));
        } else {
            $response->setContent(json_encode([
                'message' => "Такой имя пользователь не найден"
            ]));
        }
        return $response;
    }
}
