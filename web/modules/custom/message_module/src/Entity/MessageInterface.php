<?php

/**
 * @file Contains \Drupal\message_module\Entity\MessageInterface.
 */

namespace Drupal\message_module\Entity;

use Drupal\Core\Entity\ContentEntityInterface;

interface MessageInterface extends ContentEntityInterface
{
    /**
     * Gets the message value.
     *
     * @return string
     */
    public function getMessage();
}
