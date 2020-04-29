<?php

namespace UBRR\RefPoint\Core;

class Record
{
    private $id = '';
    private $data = array();
    function __construct($id, $data)
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
