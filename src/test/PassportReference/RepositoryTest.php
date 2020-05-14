<?php

use \PHPUnit\Framework\TestCase;
use UBRR\RefPoint\PassportReference\PassportRecord;
use UBRR\RefPoint\PassportReference\Repository;

class RepositoryTest extends TestCase
{
    public function testSearchBySeriesAndNumber()
    {
        $obj = new Repository();
        $obj->add(new PassportRecord('12','12','12'));
        $record = $obj->searchBySeriesAndNumber('12','12');
        $this->assertEquals('12', $record->getId());
    }
}
