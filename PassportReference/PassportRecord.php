<?php

namespace UBRR\RefPoint\PassportReference;

use UBRR\RefPoint\Core\RecordRefPoint\Core\Reference;

class PassportRecord 
{
    private string $series;
    private string $number;
    private string $id;

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
