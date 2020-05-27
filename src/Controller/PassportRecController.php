<?php

namespace App\Controller;

use App\Entity\PassportRecord;
use App\Repository\PassportRecordRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use UBRR\RefPoint\PassportReference\PassportRecord as PassportModel;
use UBRR\RefPoint\PassportReference\PassportReference;
use Symfony\Component\Routing\Annotation\Route;

class PassportRecController extends AbstractController
{
    private $reference;

    public function __construct(ManagerRegistry $registy)
    {
        $entityManager = $this->getDoctrine()->getManager();
        
        $this->reference = new PassportReference(new PassportRecordRepository($registy));
    }

    /**
     * @Route("api/passportrec/create", name="create_record")
     */
    public function createRecord(): Response
    {
        $model = new PassportModel('123', '456');
        $this->reference->add($model);
        return new Response('Saved new product with id ' . $model->getId());
    }

    /**
     * @Route("api/passportrec/{id}", name="get_record")
     */
    public function getRecord($id)
    {
        $record = $this->reference->getById($id);

        return new Response('Check out this great product: ' . $record->getNumber());
    }

    /**
     * @Route("api/passportrec/delete/{id}", name="delete_record")
     */
    public function deleteRecord($id)
    {
        $this->reference->remove($this->reference->getById($id));
 
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
