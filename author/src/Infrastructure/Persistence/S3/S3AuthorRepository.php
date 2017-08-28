<?php

namespace Drupal\author\Infrastructure\Persistence\S3;

use Drupal\author\Domain\Author\Author;
use Drupal\author\Domain\Author\AuthorRepository;

final class S3AuthorRepository implements AuthorRepository
{
    const DIR_S3 = 'images/';

    private $fileSystem;

    public function __construct($fileSystem)
    {
        $this->fileSystem = $fileSystem;
    }

    /**
     * {@inheritdoc}
     */
    public function save(Author $anAuthor)
    {
        try {
            $this->fileSystem
                ->write(
                    self::DIR_S3 . $anAuthor->imageProfile()->getName(),
                    file_get_contents($anAuthor->imageProfile()->getPath())
                );

            return $anAuthor->imageProfile()->getName();

        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function find(string $fileName)
    {
        return $this
            ->fileSystem
            ->read(self::DIR_S3 . $fileName);
    }

    /**
     * {@inheritdoc}
     */
    public function findAll() { }
}