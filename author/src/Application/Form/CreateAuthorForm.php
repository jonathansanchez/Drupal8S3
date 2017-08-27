<?php

namespace Drupal\author\Application\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\file\Entity\File;
use Symfony\Component\DependencyInjection\ContainerInterface;

class CreateAuthorForm extends FormBase
{
    private $saveAuthorService;

    /**
     * Class constructor.
     */
    public function __construct($saveAuthorService)
    {
        $this->saveAuthorService = $saveAuthorService;
    }

    /**
     * {@inheritdoc}
     */
    public static function create(ContainerInterface $container) {
        return new static(
            $container->get('author.saveanauthor_service')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getFormId()
    {
        return 'create_author_form';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['name'] = [
            '#type'     => 'textfield',
            '#title'    => $this->t('Name'),
            '#required' => TRUE
        ];
        $form['image'] = [
            '#type'     => 'managed_file',
            '#title'    => $this->t('Image'),
            '#required' => TRUE
        ];
        $form['submit'] = [
            '#type'  => 'submit',
            '#value' => $this->t('Save')
        ];

        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state) { }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        $image = $form_state->getValue('image');
        $fid = $image[0];
        $file = File::load($fid);
        $profileImage = [
            'fid'  => (int) $fid,
            'name' => (string) $file->getFilename(),
            'path' => (string) drupal_realpath($file->getFileUri())
        ];

        try {
            $this->saveAuthorService->execute(
                $form_state->getValue('name'),
                $profileImage
            );

            drupal_set_message(
                $this->t('The Author has been saved successfully.')
            );
        } catch(\Exception $e) {
            drupal_set_message(
                $this->t('The Author has not been saved.'),
                'error'
            );
            $form_state->setRebuild();
        }
    }
}