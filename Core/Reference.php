<?php

namespace UBRR\RefPoint\Core;

interface Reference
{
    public function add($name);
    public function filter();
    public function remove($name);
    public function search(Condition $Condition, int $page, int $pageSize);
}

