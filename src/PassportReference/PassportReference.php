<?php

namespace UBRR\RefPoint\PassportReference;

use UBRR\RefPoint\Core\Message;
use UBRR\RefPoint\Core\Record;
use UBRR\RefPoint\Core\Reference;

class PassportReference implements Reference
{
    private PassportRepository $repository;
    private array $users;

    function __construct(PassportRepository $repository)
    {
        $this->repository = $repository;
    }

    function filter()
    {
    }

    function add($record)
    {
        $this->repository->add($record->getData());
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

    function search($сondition, $page, $pageSize): array
    {
        
    }

    function informUsers(Message $message)
    {
        foreach ($this->users as &$user) {
            $user = "message";
        }
    }

    public function getById($id): PassportRecord
    {
        return $this->repository->getById($id);
    }
}
