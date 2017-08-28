<?php

namespace Drupal\author\Application\Services;

use Drupal\author\Domain\Author\AuthorRepository;

class ListAuthors
{
    private $authorRepository;

    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    public function execute()
    {
        return $this->authorRepository->findAll();
    }
}