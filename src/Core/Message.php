<?php

namespace UBRR\RefPoint\Core;
use UBRR\RefPoint\PassportReference\PassportRecord;
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

