<?php

namespace Drupal\faith_genesis_layout\Plugin\Layout;

use Drupal\layout_builder_base_library\Plugin\Layout\BaseTwoColumnsLayout as ContribBaseTwoColumnsLayout;

/**
 * Configurable layout plugin class.
 *
 * @internal
 *   Plugin classes are internal.
 */
class BaseTwoColumnsLayout extends ContribBaseTwoColumnsLayout {

  /**
   * {@inheritdoc}
   */
  protected function getBackgroundOptions() {
    $options = [
      'layout--background--none' => $this->t('None'),
      'layout--background--white' => $this->t('White'),
      'layout--background--grey' => $this->t('Grey'),
      'layout--background--black' => $this->t('Black'),
      'layout--background--gradient-linear-top-bottom-light' => $this->t('Light Gradient: linear top to bottom'),
      'layout--background--gradient-linear-top-bottom-dark' => $this->t('Dark Gradient: linear top to bottom'),
    ];
    $this->moduleHandler->alter('layout_builder_base_background', $options);

    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function build(array $regions) {
    $build = parent::build($regions);
    $build['#attached']['library'][] = 'faith_genesis_layout/layout';
    $build['#attached']['library'][] = 'faith_genesis_layout/base';
    return $build;
  }
}
