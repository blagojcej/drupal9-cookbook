<?php

/**
 * @file
 * Contains \Drupal\mymodule\Plugin\Field\FieldWidget\RealNameDefaultWidget
 */

namespace Drupal\mymodule\Plugin\Field\FieldWidget;

use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'realname_default' widget.
 *
 * @FieldWidget(
 * id = "realname_default",
 * label = @Translation("Real name"),
 * field_types = {
 *   "realname"
 * }
 * )
 */
class RealNameDefaultWidget extends WidgetBase
{
    /**
     * {@inheritdoc}
     */
    public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state)
    {
        $element['first_name'] = array(
            '#type' => 'textfield',
            '#title' => t('First name'),
            '#default_value' => '',
            '#size' => 25,
            '#required' => $element['#required'],
        );
        $element['last_name'] = array(
            '#type' => 'textfield',
            '#title' => t('Last name'),
            '#default_value' => '',
            '#size' => 25,
            '#required' => $element['#required'],
        );
        return $element;
    }
}
