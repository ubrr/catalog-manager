<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use App\Entity\Citiesofinfluence;

class CitiesofinfluenceController extends AbstractController {
    /**
     * @Route("/catalog/citiesofinfluence/{name}")
     * @Method({"GET"})
     */
    public function indexAction($name) {
        // return new Response
        ('<html><body>Hi</body></html>');

        $doctrine = $this->getDoctrine();

        $catalog = new Citiesofinfluence();
        $catalog->setCityname($name);

        $doctrine->getManager()->persist($catalog);
        $doctrine->getManager()->flush();
        $catalog= ['Catalog 1', 'Catalog 2'];

        return $this->render('catalog/citiesofinfluence.html.twig', array ('catalog' => $catalog));
    }
}