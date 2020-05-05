<?php

use \PHPUnit\Framework\TestCase;
use UBRR\RefPoint\PassportReference\PassportRecord;


class PassportRecordTest extends TestCase
{
    public function testGetSeries()
    {
        $obj = new PassportRecord('123', '456', '1');
        $series = $obj->getSeries();
        $this->assertEquals('123', $series);
    }
    public function testGetNumber()
    {
        $obj = new PassportRecord('123', '456', '1');
        $number = $obj->getNumber();
        $this->assertEquals('456', $number);
    }
    public function testGetId()
    {
        $obj = new PassportRecord('123', '456', '1');
        $id = $obj->getId();
        $this->assertEquals('1', $id);
    }
}
