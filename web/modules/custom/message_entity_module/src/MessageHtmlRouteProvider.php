<?php

/**
 * @file Contains \Drupal\message_entity_module\MessageHtmlRouteProvider.
 */

namespace Drupal\message_entity_module;

use Symfony\Component\Routing\Route;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\message_entity_module\Entity\MessageType;
use Drupal\Core\Entity\Routing\DefaultHtmlRouteProvider;

/**
 * Provides HTML routes for the message entity type.
 */
class MessageHtmlRouteProvider extends DefaultHtmlRouteProvider
{
    /**
     * {@inheritdoc}
     */
    public function getRoutes(EntityTypeInterface $entity_type)
    {
        $collection = parent::getRoutes($entity_type);

        $route = (new Route('/messages/add'))
            ->addDefaults([
                '_entity_form' => 'message.add',
                '_title' => 'Add message',
            ])
            ->setRequirement('_entity_create_access', 'message');
        $collection->add('entity.message.add_form', $route);

        $route = (new Route('/admin/content/messages'))
            ->addDefaults([
                '_entity_list' => 'message',
                '_title' => 'Messages',
            ])
            ->setRequirement('permission', $entity_type->getAdminPermission());
        $collection->add('entity.message.collection', $route);

        /** @var \Drupal\message_entity_module\Entity\MessageTypeInterface $message_type */
        foreach (MessageType::loadMultiple() as $message_type) {
            $route = (new Route('/messages/add/{message_type}'))
                ->addDefaults([
                    '_entity_form' => 'message.add',
                    '_title' => "Add {$message_type->label()} message",
                ])
                ->setRequirement('_entity_create_access', 'message');
            $collection->add("entity.message.{$message_type->id()}.add_form", $route);
        }

        return $collection;
    }
}
