<?php

namespace Drupal\faith_genesis_core;

/**
 * Class DefaultService.
 *
 * @package Drupal\faith_genesis_core
 */
class ColorInverseTwigExtension extends \Twig\Extension\AbstractExtension {

  /**
   * {@inheritdoc}
   * Return the unique name of the extension.
   */
  public function getName() {
    return 'color_inverse';
  }

  /**
   * {@inheritdoc}
   * Declare the extension function.
   */
  public function getFunctions() {
    return array(
      new \Twig\TwigFunction('color_inverse', array($this, 'color_inverse'), array('is_safe' => array('raw'))),
    );
  }

  public function color_inverse($color) {
    $default = '#000000';

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

    if (strlen($color) != 6){
      return $default;
    }

    $rgb = '';
    for ($x = 0; $x < 3; $x++) {
      $c = 255 - hexdec(substr($color,(2 * $x), 2));
      $c = ($c < 0) ? 0 : dechex($c);
      $rgb .= (strlen($c) < 2) ? '0'.$c : $c;
    }

    return ('#'. $rgb);
  }
}
