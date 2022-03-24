<?php
namespace App\Libraries;

class Util
{
    public function getRandomName(): string
    {
        return time() .'_'. bin2hex(random_bytes(10));
    }
}
