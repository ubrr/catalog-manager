<?php

namespace UBRR\RefPoint\PassportReference;

use PHPUnit\Framework\MockObject\Exception;

use function PHPUnit\Framework\throwException;

class Repository implements PassportRepository
{
    public  array $data;

    public function __construct()
    {
        $this->data = array();
    }

    public function add(PassportRecord $passportRecord)
    {
        $this->data[$passportRecord->getId()] = $passportRecord;
    }

    public function remove(PassportRecord $passportRecord)
    {
        if(!array_key_exists($passportRecord->getId(), $this->data)){
            throw new Exception("Record doesn't exist");
        }
        
        unset($this->data[$passportRecord->getId()]);
    }

    public function update(PassportRecord $passportRecord)
    {
        if(!array_key_exists($passportRecord->getId(), $this->data)){
            throw new Exception("Record doesn't exist");
        }

        $this->data[$passportRecord->getId()] = $passportRecord;
    }

    public function searchBySeriesAndNumber(string $series, string $number)
    {
        foreach($this->data as $passportRecord){
           if($passportRecord->getSeries() == $series && $passportRecord->getNumber() == $number)
           {
               return $passportRecord;
           } 
        }
    }

    public function getData(): array
    {
        return $this->data;
    }
}
