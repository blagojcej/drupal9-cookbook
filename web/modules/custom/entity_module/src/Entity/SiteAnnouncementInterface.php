<?php

/**
 * @file Contains \Drupal\entity_module\Entity\SiteAnnouncementInterface.
 */

namespace Drupal\entity_module\Entity;

use Drupal\Core\Config\Entity\ConfigEntityInterface;

interface SiteAnnouncementInterface extends ConfigEntityInterface
{
    /**
     * Gets the message value.
     *
     * @return string
     */
    public function getMessage();
}
