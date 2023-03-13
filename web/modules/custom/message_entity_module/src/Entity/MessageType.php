<?php

/**
 * @file Contains \Drupal\message_entity_module\Entity\MessageType.
 */

namespace Drupal\message_entity_module\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;

/**
 * Defines the profile type entity class.
 *
 * @ConfigEntityType(
 *   id = "message_type",
 *   label = @Translation("Message type"),
 *   handlers = {
 *     "list_builder" = "Drupal\message_entity_module\MessageTypeListBuilder",
 *     "form" = {
 *       "default" = "Drupal\message_entity_module\Form\MessageTypeForm",
 *       "add" = "Drupal\message_entity_module\Form\MessageTypeForm",
 *       "edit" = "Drupal\message_entity_module\Form\MessageTypeForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\DefaultHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "message_type",
 *   bundle_of = "message",
 *   admin_permission = "administer messages",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "uuid"
 *   },
 *   links = {
 *     "add-form" = "/admin/structure/message-types/add",
 *     "delete-form" = "/admin/structure/message-types/{message_type}/delete",
 *     "edit-form" = "/admin/structure/message-types/{message_type}",
 *     "admin-form" = "/admin/structure/message-types/{message_type}",
 *     "collection" = "/admin/structure/message-types"
 *   }
 * )
 */
class MessageType extends ConfigEntityBundleBase implements MessageTypeInterface
{
}
