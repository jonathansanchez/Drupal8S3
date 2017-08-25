<?php

namespace Test\author\Domain;

use Drupal\author\Domain\Author\Author;
use PHPUnit\Framework\TestCase;

class AuthorTest extends TestCase
{
    /**
     * @test
     */
    public function aNewAuthorIsNotActiveByDefault()
    {
        //For this test I have omitted the typehinting in the entity.
        $anAuthor = new Author('a name', 'some reference to image');

        $this->assertFalse($anAuthor->activate());
    }
}