<?php

namespace Drupal\message_module\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;

/**
 * Defines the Message module type configuration entity.
 *
 * @ConfigEntityType(
 *   id = "message_type",
 *   label = @Translation("Message type"),
 *   label_collection = @Translation("Message types"),
 *   label_singular = @Translation("Message type"),
 *   label_plural = @Translation("Message  types"),
 *   label_count = @PluralTranslation(
 *     singular = "@count Message type",
 *     plural = "@count Message types",
 *   ),
 *   handlers = {
 *     "form" = {
 *       "add" = "Drupal\message_module\Form\MessageTypeForm",
 *       "edit" = "Drupal\message_module\Form\MessageTypeForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm",
 *     },
 *     "list_builder" = "Drupal\message_module\MessageTypeListBuilder",
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     }
 *   },
 *   admin_permission = "administer message types",
 *   bundle_of = "message",
 *   config_prefix = "message_type",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "add-form" = "/admin/structure/message_types/add",
 *     "edit-form" = "/admin/structure/message_types/manage/{message_type}",
 *     "delete-form" = "/admin/structure/message_types/manage/{message_type}/delete",
 *     "collection" = "/admin/structure/message_types"
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "uuid",
 *   }
 * )
 */
class MessageType extends ConfigEntityBundleBase implements MessageTypeInterface {

  /**
   * The machine name of this message module type.
   *
   * @var string
   */
  protected $id;

  /**
   * The human-readable name of the message module type.
   *
   * @var string
   */
  protected $label;

}
