<?php

namespace UBRR\RefPoint\Core;

class Message
{
    public string $action;
    public Record $record;
    public Reference $reference;

    function __construct(Reference $reference,Record $record,string $action)
    {
     $this->action=$action;
     $this->record=$record;
     $this->reference=$reference;   
    }
    
}

