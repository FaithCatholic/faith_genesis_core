<?php

namespace Drupal\faith_genesis_core;

/**
 * Class DefaultService.
 *
 * @package Drupal\faith_genesis_core
 */
class Hex2RgbaTwigExtension extends \Twig_Extension {

  /**
   * {@inheritdoc}
   * Return the unique name of the extension.
   */
  public function getName() {
    return 'hex2rgba';
  }

  /**
   * {@inheritdoc}
   * Declare the extension function.
   */
  public function getFunctions() {
    return array(
      new \Twig_SimpleFunction('hex2rgba', array($this, 'hex2rgba'), array('is_safe' => array('raw'))),
    );
  }

  public function hex2rgba($color, $opacity = false) {
    $default = 'rgb(0,0,0)';

    //Return default if no color provided.
    if(empty($color)) {
      return $default;
    }

    // TODO: find out why twig passes a plain text value as an array(!)
    if (gettype($color) == 'array' && array_key_exists('#markup', $color)) {
      $color = $color['#markup'];
    }

    //Sanitize $color if "#" is provided.
    if ($color[0] == '#' ) {
      $color = substr($color, 1);
    }

    //Check if color has 6 or 3 characters and get values.
    if (strlen($color) == 6) {
      $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
    } elseif (strlen($color) == 3) {
      $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
    } else {
      return $default;
    }

    //Convert hexadec to rgb.
    $rgb = array_map('hexdec', $hex);

    //Check if opacity is set(rgba or rgb).
    if ($opacity) {
      if(abs($opacity) > 1) {
        $opacity = 1.0;
      }
      $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
    } else {
      $output = 'rgb('.implode(",",$rgb).')';
    }

    //Return rgb(a) color string.
    return $output;
  }
}
