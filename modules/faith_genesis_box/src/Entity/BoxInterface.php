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
  public function getLabel();

  /**
   * Sets the Box name.
   *
   * @param string $name
   *   The Box name.
   *
   * @return \Drupal\faith_genesis_box\Entity\BoxInterface
   *   The called Box entity.
   */
  public function setLabel($label);

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

}
