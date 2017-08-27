<?php

namespace Drupal\author\Application\Services;

use Drupal\author\Domain\Author\Author;
use Drupal\author\Domain\Author\AuthorImageProfile;
use Drupal\author\Domain\Author\AuthorName;

class SaveAnAuthor
{
    private $authorRepository;
    private $authorCloud;

    public function __construct($authorRepository, $authorCloud)
    {
        $this->authorRepository = $authorRepository;
        $this->authorCloud      = $authorCloud;
    }

    public function execute($name, $profileImage)
    {
        $author = new Author(
            AuthorName::create($name),
            AuthorImageProfile::create(
                $profileImage['fid'],
                $profileImage['name'],
                $profileImage['path']
            )
        );

        $this->authorRepository->save($author);
        $this->authorCloud->save($author);
    }
}