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
        $authorRepository = new FakeDatabaseAuthorRepository();
        $authorCloud      = new FakeS3AuthorRepository();

        $expected = (new SaveAnAuthor(
            $authorRepository,
            $authorCloud
        ))->execute('Susan', [
            'fid'  => 1,
            'name' => 'image.png',
            'path' => '/tmp'
        ]);

        $this->assertNull($expected);
        $this->assertTrue($authorRepository->saveWasCalled());
        $this->assertTrue($authorCloud->saveWasCalled());
    }
}