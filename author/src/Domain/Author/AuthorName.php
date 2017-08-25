<?php

namespace Drupal\author\Domain\Author;

class AuthorName
{
    private $name;

    private function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Name constructor
     *
     * @return AuthorName
     */
    public static function create(string $name): AuthorName
    {
        return new self($name);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}