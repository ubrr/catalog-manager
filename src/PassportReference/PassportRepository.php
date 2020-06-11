<?php

namespace UBRR\RefPoint\PassportReference;

interface PassportRepository
{
    public function add(PassportRecord $passportRecord);
    public function remove(PassportRecord $passportRecord);
    public function update(PassportRecord $passportRecord);
    public function searchBySeriesAndNumber(string $series,string $number);
    public function getById($id): ?PassportRecord;
    public function getData(int $page, ?string $serial = null, ?string $number = null):array;
}
