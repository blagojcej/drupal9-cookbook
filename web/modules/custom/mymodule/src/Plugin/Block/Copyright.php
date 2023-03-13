<?php

/**
 * @file
 * Contains \Drupal\mymodule\Plugin\Block\Copyright.
 */

namespace Drupal\mymodule\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Session\AccountInterface;

/**
 * @Block(
 * id = "copyright_block",
 * admin_label = @Translation("Copyright"),
 * category = @Translation("Custom")
 * )
 */
class Copyright extends BlockBase
{
    /**
     * {@inheritdoc}
     */
    public function build()
    {
        $date = new \DateTime();
        return [
            '#markup' => t('Copyright @year&copy; @company', [
                '@year' => $date->format('Y'),
                '@company' => $this->configuration['company_name'],
            ]),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function defaultConfiguration()
    {
        return [
            'company_name' => '',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function blockForm($form, \Drupal\Core\Form\FormStateInterface $form_state)
    {
        $form['company_name'] = [
            '#type' => 'textfield',
            '#title' => t('Company name'),
            '#default_value' => $this->configuration['company_name'],
        ];
        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function blockSubmit($form, \Drupal\Core\Form\FormStateInterface $form_state)
    {
        $this->configuration['company_name'] = $form_state->getValue('company_name');
    }

    /**
     * {@inheritdoc}
     */
    protected function blockAccess(AccountInterface $account)
    {
        $routeMatch = \Drupal::routeMatch();
        $route_name = $routeMatch->getRouteName();
        if ($account->isAnonymous() && !in_array(
            $route_name,
            array('user.login', 'user.logout')
        )) {
            return AccessResult::allowed()
                ->addCacheContexts([
                    'route.name',
                    'user.roles:anonymous'
                ]);
        }
        return AccessResult::forbidden();
    }
}
