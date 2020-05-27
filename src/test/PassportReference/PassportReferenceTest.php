<?php

use \PHPUnit\Framework\TestCase;
use UBRR\RefPoint\Core\Record;
use UBRR\RefPoint\PassportReference\PassportRecord;
use \UBRR\RefPoint\PassportReference\PassportReference;
use UBRR\RefPoint\PassportReference\Repository;


class PassportReferenceTest extends  TestCase
{

    public function testAdd()
    {
        $r = new Record('12', array('series' => 12, 'number' => 12));
        $pr = new PassportRecord('12', '12', '12');
        $obj = new PassportReference();
        $obj->add($r);
        $this->assertEquals($pr, $obj->repository->getData()[0]);
    }
    public function testRemove()
    {
        $r = new Record('12', array('series' => 12, 'number' => 12));
        $pr = new PassportRecord('12', '12', '12');
        $obj = new PassportReference();
        $obj->add($r);
        $obj->remove($r);
        $this->assertEquals(0,count($obj->repository->getData()));
    }
    // public function testSearch()
    // {

    // }
    // public function testUpdate()
    // {
    //     $obj = new PassportReference('field', 10);
    //     $value = $obj->getValue();
    //     $this->assertEquals(10, $value);
    // }
}
