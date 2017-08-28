<?php

namespace Drupal\author\Application\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

class AuthorController extends ControllerBase
{
    private $listAuthorService;

    /**
     * Class constructor.
     */
    public function __construct($listAuthorService)
    {
        $this->listAuthorService = $listAuthorService;
    }

    /**
     * {@inheritdoc}
     */
    public static function create(ContainerInterface $container) {
        return new static(
            $container->get('author.listauthors_service')
        );
    }

    public function listAll()
    {
        $authors = $this->listAuthorService->execute();

        return [
            '#theme'   => 'authors',
            '#authors' => $authors
        ];
    }
}
