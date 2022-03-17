<?php

namespace App\Libraries;

class StdobjeToArray
{
    protected $array = [];

    public function __construct($params) 
    {
        foreach ($params as $key => $val) {
            $this->array[$key] = $val;
        }
    }

    public function get() : array
    {
        return $this->array;
    }
}
