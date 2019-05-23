<?php

namespace Drupal\faith_genesis_box;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Box entity.
 *
 * @see \Drupal\faith_genesis_box\Entity\Box.
 */
class BoxAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\faith_genesis_box\Entity\BoxInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished box entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published box entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit box entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete box entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add box entities');
  }

}
