<?php

use \PHPUnit\Framework\TestCase;
use UBRR\RefPoint\Core\Record;
use UBRR\RefPoint\PassportReference\PassportRecord;
use \UBRR\RefPoint\PassportReference\PassportReference;
use UBRR\RefPoint\PassportReference\Repository;

class PassportReferenceTest extends TestCase
{

    public function testAdd()
    {
        $pr = new Record('12', '12');
        $obj = new PassportReference();
        $obj->add($pr);
        $this->assertEquals($pr, $obj->repository->getData()[0]);
    }
    // public function testRemove()
    // {
    //     $pr=new Record('12', array(10,1));
    //     $pr1=new Record('13', array(10,1,1));
    //     $obj = new PassportReference();
    //     $obj->add($pr);
    //     $obj->add($pr1);
    //     $obj->remove($pr);
    //     $this->assertEquals($pr, $obj->repository->getData() );
    // }
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
