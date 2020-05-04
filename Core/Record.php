<?php

namespace UBRR\RefPoint\Core;

class Record
{
    private string $id = '';
    private array $data = array();
    function __construct(string $id, array $data)
    {
        $this->id = $id;
        $this->data = $data;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getData()
    {
        return $this->data;
    }
}
