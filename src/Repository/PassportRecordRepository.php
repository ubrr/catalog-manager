<?php

namespace App\Repository;

use App\Entity\PassportRecord;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use UBRR\RefPoint\PassportReference\PassportRepository;
use UBRR\RefPoint\PassportReference\PassportRecord as PassportModel;

/**
 * @method PassportRecord|null find($id, $lockMode = null, $lockVersion = null)
 * @method PassportRecord|null findOneBy(array $criteria, array $orderBy = null)
 * @method PassportRecord[]    findAll()
 * @method PassportRecord[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PassportRecordRepository extends ServiceEntityRepository implements PassportRepository
{
    private $mapper;
    private $flushQty;
    const FLUSH_LIMIT = 1000;
    const LIST_LIMIT = 20;

    public function __construct(ManagerRegistry $registry)
    {
        $this->mapper = new PassportRecordMapper();
        parent::__construct($registry, PassportRecord::class);
    }

    public function __destruct()
    {
        $this->getEntityManager()->flush();
    }


    public function add(PassportModel $passportRecord)
    {
        $this->getEntityManager()->persist($this->mapper->toRecord($passportRecord));
        $this->flush();
    }

    public function getById($id): ?PassportModel
    {
        $record = $this->getDoctrine()
            ->getRepository(PassportRecord::class)
            ->find($id);
        return $record ? $this->mapper->toModel($record) : null;
    }

    public function remove(PassportModel $passportRecord)
    {
        $this->getEntityManager()->remove($this->mapper->toRecord($passportRecord));
    }

    public function update(PassportModel $passportRecord)
    {
        $this->getEntityManager()->persist($this->mapper->toRecord($passportRecord));
    }

    public function searchBySeriesAndNumber(string $series, string $number): ?PassportModel
    {
        $dql = "SELECT u FROM App\Entity\PassportRecord WHERE series=?1 AND number=?2";
        $record = $this->getEntityManager()->createQuery($dql)
            ->setParameter(1, $series)
            ->setParameter(2, $number)
            ->setMaxResults(1)
            ->getFirstResult();
        return $record ? $this->mapper->toModel($record) : null;
    }

    public function getData(int $page, ?string $serial = null, ?string $number = null): array
    {

        $dql = "SELECT u FROM App\Entity\PassportRecord";
        $records = $this->getEntityManager()->createQuery($dql)
            ->setFirstResult(($page - 1) * self::LIST_LIMIT)
            ->setMaxResults(self::LIST_LIMIT)
            ->getResult();
        $result = [];
        foreach ($records as $record) {
            $result[] = $this->mapper->toModel($record);
        }
        return $result;
    }

    private function flush()
    {
        $this->flushQty ++;
        if($this->flushQty >= self::FLUSH_LIMIT) {
            $this->getEntityManager()->flush();
            $this->flushQty = 0;
        }
    }
}
