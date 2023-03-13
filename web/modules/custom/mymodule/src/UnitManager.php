<?php

/**
 * @file
 * Contains \Drupal\mymodule\UnitManager.
 */

namespace Drupal\mymodule;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Plugin\Discovery\ContainerDerivativeDiscoveryDecorator;
use Drupal\Core\Plugin\Discovery\YamlDiscovery;

class UnitManager extends DefaultPluginManager
{
    /**
     * Default values for each unit plugin.
     *
     * @var array
     */
    protected $defaults = [
        'id' => '',
        'label' => '',
        'unit' => '',
        'factor' => 0.00,
        'type' => '',
        'class' => 'Drupal\mymodule\Unit',
    ];

    /**
     * Constructs a ArchiverManager object.
     *
     * @param \Traversable $namespaces
     *   An object that implements \Traversable which contains the root paths
     *   keyed by the corresponding namespace to look for plugin implementations.
     * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend
     *   Cache backend instance to use.
     * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
     *   The module handler to invoke the alter hook with.
     */
    public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler)
    {
        $this->namespaces = $namespaces;
        $this->moduleHandler = $module_handler;
        $this->alterInfo('physical_unit');
        $this->setCacheBackend($cache_backend, 'physical_unit_plugins');
    }

    /**
     * {@inheritdoc}
     */
    protected function getDiscovery()
    {
        if (!isset($this->discovery)) {
            $this->discovery = new YamlDiscovery('units', $this->moduleHandler->getModuleDirectories());
            $this->discovery = new ContainerDerivativeDiscoveryDecorator($this->discovery);
        }
        return $this->discovery;
    }
}
