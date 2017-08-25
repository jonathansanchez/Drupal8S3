<?php

namespace Test\author\Domain;

use Drupal\author\Domain\Author\AuthorName;
use PHPUnit\Framework\TestCase;
use Test\author\Dependencies\Stub\NameStub;

class AuthorNameTest extends TestCase
{
    /**
     * @test
     */
    public function nameShouldRepresentSameValue() {
        $aName = NameStub::random();

        $this->assertEquals(
            $aName,
            (AuthorName::create($aName))->getName()
        );
    }

    /**
     * @test
     */
    public function copiedNameShouldRepresentSameValue() {
        $randomName  = NameStub::random();
        $aName       = AuthorName::create($randomName);
        $anotherName = AuthorName::create($randomName);

        $this->assertEquals($anotherName, $aName);
        $this->assertEquals($anotherName->getName(), $aName->getName());
    }
}