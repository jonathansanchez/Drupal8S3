<?php

namespace Drupal\author\Domain\Author;

class AuthorImageProfile
{
    private $fid;
    private $name;
    private $path;

    private function __construct($fid, $name, $path)
    {
        $this->fid  = $fid;
        $this->name = $name;
        $this->path = $path;
    }

    /**
     * Name constructor
     *
     * @return AuthorImageProfile
     */
    public static function create(int $fid, string $name, string $path): AuthorImageProfile
    {
        return new self($fid, $name, $path);
    }

    /**
     * @return mixed
     */
    public function getFid()
    {
        return $this->fid;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }
}