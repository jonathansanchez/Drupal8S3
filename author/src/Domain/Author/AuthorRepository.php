<?php

namespace Drupal\author\Domain\Author;

/**
 * Interface Author
 * @package Domain\Author
 *
 * This file must be implemented by infrastructure
 * to persist an Author.
 */
interface AuthorRepository
{
    /**
     * Save an Author
     *
     * @param Author $anAuthor
     *
     * @return bool true|false
     */
    public function save(Author $anAuthor);

    /**
     * Find a profile image
     *
     * @param string $authorName
     *
     * @return Author|null
     */
    public function find(string $authorName);
}