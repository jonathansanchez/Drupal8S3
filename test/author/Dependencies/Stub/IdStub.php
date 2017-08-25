<?php

namespace Test\author\Dependencies\Stub;

use Faker\Factory;

class IdStub
{
    public static function random(): string
    {
        return Factory::create()->randomNumber();
    }
}