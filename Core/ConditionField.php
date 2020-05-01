<?php

namespace UBRR\RefPoint\Core;

class ConditionField
{
    private string $name;
    private $value;
    function __construct(string $name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    public function getField()
    {
        return $this->name;
    }
    public function getValue()
    {
        return $this->value;
    }
}
