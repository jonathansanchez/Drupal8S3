<?php

namespace Test\author\Domain;

use Drupal\author\Domain\Author\AuthorImageProfile;
use PHPUnit\Framework\TestCase;
use Test\author\Dependencies\Stub\IdStub;
use Test\author\Dependencies\Stub\NameStub;

class AuthorImageProfileTest extends TestCase
{
    /**
     * @test
     */
    public function valuesShouldRepresentSameValues() {
        $anId  = IdStub::random();
        $aName = NameStub::random();
        $aPath = NameStub::random();

        $aProfileImage = AuthorImageProfile::create($anId, $aName, $aPath);

        $this->assertEquals($anId, $aProfileImage->getFid());
        $this->assertEquals($aName, $aProfileImage->getName());
        $this->assertEquals($aPath, $aProfileImage->getPath());
    }
}