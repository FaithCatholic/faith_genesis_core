<?php

namespace Drupal\faith_genesis_box\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Box entities.
 *
 * @ingroup faith_genesis_box
 */
interface BoxInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Box name.
   *
   * @return string
   *   Name of the Box.
   */
  public function getName();

  /**
   * Sets the Box name.
   *
   * @param string $name
   *   The Box name.
   *
   * @return \Drupal\faith_genesis_box\Entity\BoxInterface
   *   The called Box entity.
   */
  public function setName($name);

  /**
   * Gets the Box creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Box.
   */
  public function getCreatedTime();

  /**
   * Sets the Box creation timestamp.
   *
   * @param int $timestamp
   *   The Box creation timestamp.
   *
   * @return \Drupal\faith_genesis_box\Entity\BoxInterface
   *   The called Box entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Box published status indicator.
   *
   * Unpublished Box are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Box is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Box.
   *
   * @param bool $published
   *   TRUE to set this Box to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\faith_genesis_box\Entity\BoxInterface
   *   The called Box entity.
   */
  public function setPublished($published);

}
