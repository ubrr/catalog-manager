<?php

namespace App\Controller;

use App\Entity\PassportRecord;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PassportRecController extends AbstractController
{
    /**
     * @Route("api/passportrec/create", name="create_record")
     */
    public function createRecord(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $record = new PassportRecord();
        $record->setNumber('123');
        $record->setSeries('456');
        $entityManager->persist($record);
        $entityManager->flush();
        return new Response('Saved new product with id ' . $record->getId());
    }

    /**
     * @Route("api/passportrec/{id}", name="get_record")
     */
    public function getRecord($id)
    {
        $record = $this->getDoctrine()
            ->getRepository(PassportRecord::class)
            ->find($id);

        if (!$record) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }

        return new Response('Check out this great product: ' . $record->getNumber());
    }

    /**
     * @Route("api/passportrec/delete/{id}", name="delete_record")
     */
    public function deleteRecord($id)
    {
        $record = $this->getDoctrine()
            ->getRepository(PassportRecord::class)
            ->find($id);
        

        if (!$record) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($record);
        $entityManager->flush();
 
        return new Response('Deleted: ' . $id);
    }

    /**
     * @Route("api/passportrec/update/{id}", name="update_record")
     */
    public function updateRecord($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $record = $entityManager->getRepository(PassportRecord::class)->find($id);
    
        if (!$record) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
    
        $record->setNumber('8910');
        $entityManager->flush();
    
        return $this->redirectToRoute('get_record', [
            'id' => $record->getId()
            ]);
    }
    // public function searchBySeries($series)
    // {
    //     $record = $this->getDoctrine()
    //     ->getRepository(PassportRecord::class)
    //     ->searchBySeriesAndNumber($series);

    // if (!$record) {
    //     throw $this->createNotFoundException(
    //         'No product found for id ' . $series
    //     );
    // }

    // return new Response('Check out this great product: ' . $record);
    // }
}
