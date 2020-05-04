<?php

use \PHPUnit\Framework\TestCase;
use \UBRR\RefPoint\Core\ConditionField;


class ConditionFieldTest extends TestCase
{
    public function testGetField()
    {
         $obj = new ConditionField('field', 10);
         $field = $obj->getField();
         $this->assertEquals('field', $field);
    }
}