<?php

use \PHPUnit\Framework\TestCase;
use UBRR\RefPoint\Core\Record;

class RecordTest extends TestCase
{
    public function testGetId()
    {
        $obj = new Record('12', array(10,1));
        $id = $obj->getId();
        $this->assertEquals('12', $id);
    }
    public function testGetData()
    {
        $obj = new Record('12', array(1,12,12));
        $value = $obj->getData();
        $this->assertEquals(array(1,12,12), $value);
    }
}
