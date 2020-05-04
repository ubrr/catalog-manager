<?php

namespace UBRR\RefPoint\PassportReference;

use UBRR\RefPoint\Core\RecordRefPoint\Core\Reference;

class PassportRecord 
{
    private string $series;
    private string $number;
    private string $id;
    
    function __construct(string $series,string $number,string $id)
    {
        $this->series = $series;
        $this->id = $id;
        $this->number = $number;
    }

    function getSeries()
    {
        return $this->series;
    }
    function getNumber()
    {
        return $this->number;
    }
    function getId()
    {
        return $this->id;
    }
}
