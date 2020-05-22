<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AbstractController
{
    /**
     * @Route("/api/auth/register", name="auth_register")
     */
    public function register(Request $request)
    {   
        $body = $request->request->all();
        // $body = json_decode($request, true);
        // $userEmail=$body["email"];
        // $repository =  $this->getDoctrine()
        //     ->getRepository(User::class)
        //     ->findOneByEmail($userEmail);
        
        
        print_r($body);
        $response = new Response();
        // $response->setContent(json_encode([
        //     'data' => $request
        // ]));
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
