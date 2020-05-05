<?php

namespace UBRR\RefPoint\Core;

class Record
{
    private string $id = '';
    private string $data = '';
    function __construct(string $id, string $data)
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
