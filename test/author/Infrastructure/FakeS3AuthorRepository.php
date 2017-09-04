<?php

namespace Test\author\Infrastructure;

class FakeS3AuthorRepository
{
    private $called = false;

    public function save()
    {
        $this->called = true;
    }

    public function saveWasCalled()
    {
        return $this->called;
    }
}