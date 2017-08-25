<?php

namespace Drupal\author\Domain\Author;

use Drupal\author\Domain\Status\Status;

class Author
{
    /** @var  AuthorName $name */
    private $name;
    /** @var  AuthorImageProfile $imageProfile */
    private $imageProfile;
    private $status;
    private $createdAt;

    public function __construct(AuthorName $anAuthorName, AuthorImageProfile $anImageProfile)
    {
        $this->setName($anAuthorName);
        $this->setImageProfile($anImageProfile);
        $this->deactivate();
        $this->createdAt(new \DateTimeImmutable());
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

    private function createdAt(\DateTimeImmutable $aDate)
    {
        $this->createdAt = $aDate;
    }

    private function setStatus(Status $anAuthorStatus)
    {
        $this->status = $anAuthorStatus;
    }

    public function deactivate()
    {
        $this->setStatus(
            Status::deactivate()
        );
    }

    public function activate() {
        return $this->status->equalsTo(Status::active());
    }
}