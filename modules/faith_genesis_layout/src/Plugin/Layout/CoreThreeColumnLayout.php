<?php

namespace Drupal\faith_genesis_layout\Plugin\Layout;

use Drupal\layout_options\Plugin\Layout\LayoutOptions;

/**
 * Layout Plugin that allows format options to be defined via YAML files.
 */
class CoreThreeColumnLayout extends LayoutOptions {

  /**
   * {@inheritdoc}
   */
  public function build(array $regions) {
    $build = parent::build($regions);
    $build['#attached']['library'][] = 'faith_genesis_layout/layout';
    $build['#attached']['library'][] = 'faith_genesis_layout/threecol';
    return $build;
  }
}
