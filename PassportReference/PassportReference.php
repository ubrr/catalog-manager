<?php

namespace UBRR\RefPoint\PassportReference;

use UBRR\RefPoint\Core\Message;
use UBRR\RefPoint\Core\RecordRefPoint\Core\Reference;

class PassportReference implements Reference
{
    private PassportRepository $repository;
    private array $users;

     function filter()
    {
    }

    function add(PassportRecord $passportRecord)
    {
        $this->informUsers(new Message($this, $passportRecord,"add"));
    }

    function remove(PassportRecord $passportRecord)
    {
        $this->informUsers(new Message($this, $passportRecord,"remove"));
    }
    function update(PassportRecord $passportRecord)
    {
        $this->informUsers(new Message($this, $passportRecord,"upadte"));
    }

    function search($сondition, $page, $pageSize)
    {
    }
    
    function informUsers(Message $message)
    {
        foreach ($this->users as &$user){
            $user="message";
        }
    }
}
