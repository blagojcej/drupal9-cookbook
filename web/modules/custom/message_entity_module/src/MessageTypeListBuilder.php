<?php

/**
 * @file Contains \Drupal\message_entity_module\MessageTypeListBuilder
 */

namespace Drupal\message_entity_module;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;

class MessageTypeListBuilder extends EntityListBuilder
{
    public function buildHeader()
    {
        $header['label'] = t('Label');
        return $header + parent::buildHeader();
    }
    public function buildRow(EntityInterface $entity)
    {
        $row['label'] = $entity->label();
        return $row + parent::buildRow($entity);
    }
}
