<?php

namespace Drupal\author\Application\Services;

use Drupal\author\Domain\Author\Author;
use Drupal\author\Domain\Author\AuthorImageProfile;
use Drupal\author\Domain\Author\AuthorName;
use Drupal\author\Domain\Author\AuthorRepository;

class SaveAnAuthor
{
    /** @var  AuthorRepository */
    private $authorRepository;

    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
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
    }
}