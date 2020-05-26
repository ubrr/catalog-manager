<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
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
        // $userPassword = $body["password"];
        // $repository =  $this->getDoctrine()
        //     ->getRepository(User::class)
        //     ->findOneByEmail($userEmail);
        // $loger->info("userEmail:". $userEmail);
        // $entityManager = $this->getDoctrine()->getManager();
        // $user = new User();
        // $user->setEmail($userEmail);
        // $user->setPassword($userPassword);
        // $entityManager->persist($user);
        // $entityManager->flush();

        // print_r($body);
        $response = new Response();
        $response->setContent(json_encode([
            'data' => $userEmail
        ]));
        // $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
    /**
     * @Route("/api/auth/login", name="auth_login")
     */
    public function login()
    {
        return $this->render('auth_c/index.html.twig', [
            'controller_name' => 'AuthCController',
        ]);
    }
}
