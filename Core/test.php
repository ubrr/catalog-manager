<?php
    $array = [ "a",  "b",  "c"];
    foreach($array as $item){
        print($item);
    }
    print(' ');
    unset($array[1]);
    foreach($array as $item){
        print($item);
    }