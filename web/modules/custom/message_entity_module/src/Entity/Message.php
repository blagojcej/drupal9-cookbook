<?php

/**
 * @file Contains \Drupal\message_entity_module\Entity\Message
 */

namespace Drupal\message_entity_module\Entity;

use Drupal;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\message_entity_module\Entity\MessageInterface;

/**
 * Defines the message entity class.
 *
 * @ContentEntityType(
 *   id = "message",
 *   label = @Translation("Message"),
 *   handlers = {
 *     "list_builder" = "Drupal\message_entity_module\MessageListBuilder",
 *     "access" = "Drupal\message_entity_module\MessageAccessControlHandler",
 *     "storage" = "Drupal\message_entity_module\MessageStorage",
 *     "form" = {
 *         "default" = "Drupal\Core\Entity\ContentEntityForm",
 *         "add" = "Drupal\Core\Entity\ContentEntityForm",
 *         "edit" = "Drupal\Core\Entity\ContentEntityForm",
 *         "delete" = "Drupal\Core\Entity\ContentEntityDeleteForm",
 *     },
 *     "route_provider" = {
 *         "html" = "Drupal\message_entity_module\MessageHtmlRouteProvider",
 *     },
 *   },
 *   base_table = "message",
 *   fieldable = TRUE,
 *   bundle_entity_type = "message_type",
 *   admin_permission = "administer messages",
 *   field_ui_base_route = "entity.message_type.edit_form",
 *   entity_keys = {
 *     "id" = "message_id",
 *     "label" = "title",
 *     "langcode" = "langcode",
 *     "bundle" = "bundle",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/messages/{message}",
 *     "add-form" = "/messages/add/{message_type}",
 *     "edit-form" = "/messages/{message}/edit",
 *     "delete-form" = "/messages/{message}/delete",
 *     "collection" = "/admin/content/messages"
 *   },
 * )
 */
class Message extends ContentEntityBase implements MessageInterface
{
    /**
     * {@inheritdoc}
     */
    public static function baseFieldDefinitions(EntityTypeInterface $entity_type)
    {
        $fields = parent::baseFieldDefinitions($entity_type);

        $fields['message_id'] = BaseFieldDefinition::create('integer')
            ->setLabel(t('Message ID'))
            ->setDescription(t('The message ID.'))
            ->setReadOnly(TRUE)
            ->setSetting('unsigned', TRUE);
        $fields['langcode'] = BaseFieldDefinition::create('language')
            ->setLabel(t('Language code'))
            ->setDescription(t('The message language code.'))
            ->setRevisionable(TRUE);
        $fields['uuid'] = BaseFieldDefinition::create('uuid')
            ->setLabel(t('UUID'))
            ->setDescription(t('The message UUID.'))
            ->setReadOnly(TRUE);
        $fields['title'] = BaseFieldDefinition::create('string')
            ->setLabel(t('Title'))
            ->setRequired(TRUE)
            ->setTranslatable(TRUE)
            ->setRevisionable(TRUE)
            ->setSetting('max_length', 255)
            ->setDisplayOptions('view', array(
                'label' => 'hidden',
                'type' => 'string',
                'weight' => -5,
            ))
            ->setDisplayOptions('form', array(
                'type' => 'string_textfield',
                'weight' => -5,
            ))
            ->setDisplayConfigurable('form', TRUE);
        $fields['content'] = BaseFieldDefinition::create('text_long')
            ->setLabel(t('Content'))
            ->setDescription(t('Content of the message'))
            ->setTranslatable(TRUE)
            ->setDisplayOptions('view', array(
                'label' => 'hidden',
                'type' => 'text_default',
                'weight' => 0,
            ))
            ->setDisplayConfigurable('view', TRUE)
            ->setDisplayOptions('form', array(
                'type' => 'text_textfield',
                'weight' => 0,
            ))
            ->setDisplayConfigurable('form', TRUE);
        $fields['bundle'] = BaseFieldDefinition::create('entity_reference')
            ->setLabel(t('Message type'))
            ->setDescription(t('The message type.'))
            ->setSetting('target_type', 'message_type')
            ->setSetting('max_length', EntityTypeInterface::BUNDLE_MAX_LENGTH);
        return $fields;
    }

    /**
     * {@inheritdoc}
     */
    public function getMessage()
    {
        return $this->get('content')->value;
    }
}
