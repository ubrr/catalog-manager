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
    public function testGetValue()
    {
        $obj = new ConditionField('field', 10);
        $value = $obj->getValue();
        $this->assertEquals(10, $value);
    }
}
