<?php

namespace Test\author\Infrastructure;

class FakeDatabaseAuthorRepository
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

    public function findAll()
    {
        return [
            'fid'  => 1,
            'name' => 'image.png',
            'path' => '/tmp'
        ];
    }

}