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
use \Firebase\JWT\JWT;


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
        $userPassword = password_hash($userPassword, PASSWORD_BCRYPT);
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
        $userPassword = password_hash($userPassword, PASSWORD_BCRYPT);
        $entityManager = $this->getDoctrine()->getManager();

        $candidate =  $this->getDoctrine()
            ->getRepository(User::class)
            ->findOneByEmail($userEmail);

        $response = new Response();
        if ($candidate != NULL) {
            if (password_verify($candidate->getPassword(), $userPassword)) {
                return  $response->setContent(json_encode([
                    'message' => "Неверные данные",

                ]));
            }
            $token = array(
                "data" => array(
                    "id" => $candidate->getId(),

                    "email" => $candidate->getEmail()
                )
            );
            $key = "supersecretkey";
            $jwt = JWT::encode($token, $key);
            //  $decoded = JWT::decode($jwt, $key, array('HS256'));
            $response->setContent(json_encode([
                'userId' => $candidate->getId(),
                'email' => $candidate->getEmail(),
                'token' => $jwt,
            ]));
        } else {
            $response->setContent(json_encode([
                'message' => "Неверные данные"
            ]));
        }
        return $response;
    }
}
