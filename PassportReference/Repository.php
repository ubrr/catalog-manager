<?php

namespace UBRR\RefPoint\PassportReference;


class Repository implements PassportRepository
{   
    public array $data;

    public function __construct()
    {
        $this->data = array();
    }

    public function add(PassportRecord $passportRecord)
    {
        array_push($this->data,$passportRecord);
    }
    public function remove(PassportRecord $passportRecord)
    {
        
    }
    public function update(PassportRecord $passportRecord)
    {
        
    }
    public function searchBySeriesAndNumber(string $series, string $number)
    {
        
    }
    public function getData()
    {
        return $this->data;
    }
}
