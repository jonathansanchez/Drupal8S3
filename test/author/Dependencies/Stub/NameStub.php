<?php

namespace Test\author\Dependencies\Stub;

use Faker\Factory;

final class NameStub
{
    public static function random(): string
    {
        return Factory::create()->name();
    }
}