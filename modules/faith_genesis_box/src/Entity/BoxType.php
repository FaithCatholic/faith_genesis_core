<?php

namespace Drupal\faith_genesis_box\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;

/**
 * Defines the Box type entity.
 *
 * @ConfigEntityType(
 *   id = "box_type",
 *   label = @Translation("Box type"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\faith_genesis_box\BoxTypeListBuilder",
 *     "form" = {
 *       "add" = "Drupal\faith_genesis_box\Form\BoxTypeForm",
 *       "edit" = "Drupal\faith_genesis_box\Form\BoxTypeForm",
 *       "delete" = "Drupal\faith_genesis_box\Form\BoxTypeDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\faith_genesis_box\BoxTypeHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "box_type",
 *   admin_permission = "administer site configuration",
 *   bundle_of = "box",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/box/{box_type}",
 *     "add-form" = "/admin/structure/box/add",
 *     "edit-form" = "/admin/structure/box/manage/{box_type}",
 *     "delete-form" = "/admin/structure/box/manage/{box_type}/delete",
 *     "collection" = "/admin/structure/box"
 *   }
 * )
 */
class BoxType extends ConfigEntityBundleBase implements BoxTypeInterface {

  /**
   * The Box type ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Box type label.
   *
   * @var string
   */
  protected $label;

}
