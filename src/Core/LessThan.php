<?php

namespace UBRR\RefPoint\Core;

use UBRR\RefPoint\Core\ConditionField;
 
class LessThan implements Condition
{
    private ConditionField $conditionField;

    function __construct(ConditionField $conditionField)
    {
        $this->conditionField = $conditionField;
    }

    public function getValue()
    {
        return $this->conditionField;
    }
    public function getType(): string
    {
        return self::LESSTHAN;
    }
}
