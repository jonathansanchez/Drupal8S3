<?php

namespace Test\author\Behavior;

use Drupal\author\Application\Services\ListAuthors;
use PHPUnit\Framework\TestCase;
use Test\author\Infrastructure\FakeDatabaseAuthorRepository;

class ListAuthorsTest extends TestCase
{
    /**
     * @test
     */
    public function tryToGetAllAuthors()
    {
        $expected = (new ListAuthors(
            new FakeDatabaseAuthorRepository()
        ))->execute();

        $this->assertNotEmpty($expected);
    }
}