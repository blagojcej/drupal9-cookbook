<?php

/**
 * @file
 * Contains \Drupal\angularjs_module\Plugin\Block\AngularBlock.
 */

namespace Drupal\angularjs_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a block for AngularJS example.
 *
 * @Block(
 *  id = "angularjs_module_angular_block",
 *  admin_label = @Translation("AngularJS Block")
 * )
 */
class AngularBlock extends BlockBase
{
    public function build()
    {
        return [
            'input' => [
                '#type' => 'textfield',
                '#title' => $this->t('Name'),
                '#placeholder' => $this->t('Enter a name here'),
                '#attributes' => [
                    'ng-model' => 'yourName',
                ],
            ],
            'name' => [
                '#markup' => '<hr><h1>Hello {{yourName}}!</h1>',
            ],
            '#attached' => [
                'library' => [
                    'angularjs_module/angular',
                ],
            ],
        ];
    }
}
