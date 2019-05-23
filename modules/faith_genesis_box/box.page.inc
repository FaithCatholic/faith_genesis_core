<?php

/**
 * @file
 * Contains box.page.inc.
 *
 * Page callback for Box entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Box templates.
 *
 * Default template: box.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_box(array &$variables) {
  // Fetch Box Entity Object.
  $box = $variables['elements']['#box'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
