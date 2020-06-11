<?php

namespace UBRR\RefPoint\Core;

class Record
{
    private ?string $id = '';
    private $data;
    function __construct($data, string $id = null)
    {
        $this->id = $id;
        $this->data = $data;
    }
    public function getId(): ?string
    {
        return $this->id;
    }
    public function getData()
    {
        return $this->data;
    }
}
