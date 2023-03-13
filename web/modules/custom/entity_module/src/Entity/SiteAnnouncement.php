<?php

/**
 * @file Contains \Drupal\entity_module\Entity\SiteAnnouncement
 */

namespace Drupal\entity_module\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;

/**
* @ConfigEntityType(
*   id ="announcement",
*   label = @Translation("Site Announcement"),
*   handlers = {
*       "list_builder" = "Drupal\entity_module\SiteAnnouncementListBuilder",
*       "form" = {
*           "default" = "Drupal\entity_module\SiteAnnouncementForm",
*           "add" = "Drupal\entity_module\SiteAnnouncementForm",
*           "edit" = "Drupal\entity_module\SiteAnnouncementForm",
*           "delete" = "Drupal\Core\Entity\EntityDeleteForm"
*       }
*   },
*   config_prefix = "announcement",
*   entity_keys = {
*       "id" = "id",
*       "label" = "label"
*   },
*   links = {
*       "delete-form" = "/admin/config/system/site-announcements/manage/{announcement}/delete",
*       "edit-form" = "/admin/config/system/site-announcements/manage/{announcement}",
*       "collection" = "/admin/config/system/site-announcements",
*   },
*   config_export = {
*       "id",
*       "label",
*       "message",
*   }
* )
*/
class SiteAnnouncement extends ConfigEntityBase implements SiteAnnouncementInterface
{
    /**
     * The announcement's message.
     *
     * @var string
     */
    protected $message;
    /**
     * {@inheritdoc|}
     */
    public function getMessage()
    {
        return $this->message;
    }
}
