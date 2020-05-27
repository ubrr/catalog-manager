<?php

namespace UBRR\RefPoint\Core;

interface Condition
{
    const EQUAL="EQUAL";
    const LESSOREQUAL="LESSOREQUAL";
    const GREATEOREQUAL="GREATEOREQUAL";
    const GREATETHAN="GREATETHAN";
    const LESSTHAN="LESSTHAN";
    const CONTAIN="CONTAIN";

    public function getType();
    public function getValue();
}
