<?php

/**
 * @file Contains \Drupal\message_entity_module\MessageStorage.
 */

namespace Drupal\message_entity_module;

use Drupal\Core\Entity\Sql\SqlContentEntityStorage;

/**
 * Defines the entity storage for messages.
 */
class MessageStorage extends SqlContentEntityStorage
{
    /**
     * Load multiple messages by bundle type.
     *
     * @param string $message_type
     *   The message type.
     *
     * @return array|\Drupal\Core\Entity\EntityInterface[]
     *   An array of loaded message entities.
     */
    public function loadMultipleByType($message_type)
    {
        return $this->loadByProperties([
            'type' => $message_type,
        ]);
    }
}
