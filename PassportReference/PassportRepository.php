<?php

namespace UBRR\RefPoint\PassportReference;

interface PassportReference
{
    public function add();
    public function remove();
    public function update();
    public function searchBySeriesAndNumber(string $series,string $number);
}
