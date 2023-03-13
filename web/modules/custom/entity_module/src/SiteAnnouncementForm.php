<?php

namespace Drupal\entity_module;

use Drupal\Component\Utility\Unicode;
use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Language\LanguageInterface;

class SiteAnnouncementForm extends EntityForm
{
    /**
     * {@inheritdoc}
     */
    public function form(array $form, FormStateInterface $form_state)
    {
        $form = parent::form($form, $form_state);
        /** @var \Drupal\entity_module\Entity\SiteAnnouncementInterface $entity */
        $entity = $this->entity;
        $form['label'] = [
            '#type' => 'textfield',
            '#title' => t('Label'),
            '#required' => TRUE,
            '#default_value' => $entity->label(),
        ];
        $form['message'] = [
            '#type' => 'textarea',
            '#title' => t('Message'),
            '#required' => TRUE,
            '#default_value' => $entity->getMessage(),
        ];
        return $form;
    }
    /**
     * {@inheritdoc}
     */
    public function save(array $form, FormStateInterface $form_state)
    {
        $entity = $this->entity;
        $is_new = !$entity->getOriginalId();
        if ($is_new) {
            // Configuration entities need an ID manually set.
            $machine_name = \Drupal::transliteration()->transliterate(
                    $entity->label(),
                    LanguageInterface::LANGCODE_DEFAULT,
                    '_'
                );
            $entity->set('id', mb_strtolower($machine_name));
            \Drupal::messenger()->addMessage(t('The %label announcement has been created.', array('%label' => $entity->label())));
        } else {
            \Drupal::messenger()->addMessage(t('Updated the %label announcement.', array('%label' => $entity->label())));
        }
        $entity->save();
        // Redirect to edit form so we can populate colors.
        $form_state->setRedirectUrl($this->entity->toUrl('collection'));
    }
}
