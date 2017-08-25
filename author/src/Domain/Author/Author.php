<?php

namespace Drupal\author\Domain\Author;

class Author
{
    /** @var  AuthorName $name */
    private $name;
    /** @var  AuthorImageProfile $imageProfile */
    private $imageProfile;

    public function __construct(AuthorName $anAuthorName, AuthorImageProfile $anImageProfile)
    {
        $this->setName($anAuthorName);
        $this->setImageProfile($anImageProfile);
    }

    private function setName($anAuthorName)
    {
        $this->name = $anAuthorName;
    }

    public function name()
    {
        return $this->name;
    }

    private function setImageProfile($anImageProfile)
    {
        $this->imageProfile = $anImageProfile;
    }

    public function imageProfile()
    {
        return $this->imageProfile;
    }
}