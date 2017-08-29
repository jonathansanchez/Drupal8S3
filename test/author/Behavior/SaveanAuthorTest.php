<?php

namespace Test\author\Behavior;

use Drupal\author\Application\Services\SaveAnAuthor;
use PHPUnit\Framework\TestCase;
use Test\author\Infrastructure\FakeDatabaseAuthorRepository;
use Test\author\Infrastructure\FakeS3AuthorRepository;

class SaveanAuthorTest extends TestCase
{
    /**
     * @test
     */
    public function tryToSaveAnAuthor()
    {
        $expected = (new SaveAnAuthor(
            new FakeDatabaseAuthorRepository(),
            new FakeS3AuthorRepository()
        ))->execute('Susan', [
            'fid'  => 1,
            'name' => 'image.png',
            'path' => '/tmp'
        ]);

        $this->assertNull($expected);
    }
}