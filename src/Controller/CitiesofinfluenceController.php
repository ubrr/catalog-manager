<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use App\Entity\Citiesofinfluence;

class CitiesofinfluenceController extends AbstractController {
    /**
     * @Route("/catalog/citiesofinfluence/")
     * @Method({"GET"})
     */
    public function indexAction() {
        // return new Response
        ('<html><body>Hi</body></html>');

    
        $catalog= ['Catalog 1', 'Catalog 2'];

        return $this->render('catalog/citiesofinfluence.html.twig', array ('catalog' => $catalog));
    }
}