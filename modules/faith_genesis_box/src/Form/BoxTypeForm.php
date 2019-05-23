<?php

namespace Drupal\faith_genesis_box\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class BoxTypeForm.
 */
class BoxTypeForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $box_type = $this->entity;
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $box_type->label(),
      '#description' => $this->t("Label for the Box type."),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $box_type->id(),
      '#machine_name' => [
        'exists' => '\Drupal\faith_genesis_box\Entity\BoxType::load',
      ],
      '#disabled' => !$box_type->isNew(),
    ];

    /* You will need additional form elements for your custom properties. */

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $box_type = $this->entity;
    $status = $box_type->save();

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Box type.', [
          '%label' => $box_type->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Box type.', [
          '%label' => $box_type->label(),
        ]));
    }
    $form_state->setRedirectUrl($box_type->toUrl('collection'));
  }

}
