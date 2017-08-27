<?php

namespace Drupal\author\Infrastructure\Persistence\Database;

use Drupal\author\Domain\Author\Author;
use Drupal\author\Domain\Author\AuthorRepository;
use Drupal\Core\Database\Connection;

final class DatabaseAuthorRepository implements AuthorRepository
{
    private $databaseApi;

    /**
     * Class constructor.
     */
    public function __construct(Connection $databaseApi)
    {
        $this->databaseApi = $databaseApi;
    }

    /**
     * {@inheritdoc}
     */
    public function save(Author $anAuthor)
    {
        try {
            $this
                ->databaseApi
                ->insert('author')
                ->fields([
                    'name',
                    'filename'
                ])
                ->values([
                    $anAuthor->name()->getName(),
                    $anAuthor->imageProfile()->getName()
                ])
                ->execute();

        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function find(string $authorName)
    {
        return $this
            ->databaseApi
            ->select('author', 'a')
            ->fields('a',  ['id', 'name', 'filename'])
            ->condition('name', $authorName)
            ->execute()
            ->fetchAssoc();
    }
}