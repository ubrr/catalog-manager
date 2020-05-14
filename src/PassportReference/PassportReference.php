<?php

namespace UBRR\RefPoint\PassportReference;

use UBRR\RefPoint\Core\Message;
use UBRR\RefPoint\Core\Record;
use UBRR\RefPoint\Core\Reference;

class PassportReference implements Reference
{
    public PassportRepository $repository;
    private array $users;

    function __construct()
    {
        $this->repository = new Repository();
    }

    function filter()
    {
    }

    function add($record)
    {
        $id=$record->getId();
        $data=$record->getData();
        $this->repository->add(new PassportRecord($id, $data['series'], $data['number']));
        // $this->informUsers(new Message($this, $record, "add"));
    }

    function remove($record)
    {
        $id=$record->getId();
        $data=$record->getData();
        $this->repository->remove(new PassportRecord($id, $data['series'], $data['number']));
        // $this->informUsers(new Message($this, $record, "remove"));
    }

    function update($record)
    {
        $this->repository->update(new PassportRecord('12', '12', '12'));
        $this->informUsers(new Message($this, $record, "upadte"));
    }

    function search($сondition, $page, $pageSize)
    {
        
    }

    function informUsers(Message $message)
    {
        foreach ($this->users as &$user) {
            $user = "message";
        }
    }
}
