<?php

namespace Drupal\admin_configuration_form\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Session\AccountInterface;


/**
 * Provides a User Time and Location block.
 *
 * @Block(
 *   id = "time_location_block",
 *   admin_label = @Translation("Time Location Block"),
 * 
 * )
*/

class LocationBlock extends BlockBase implements ContainerFactoryPluginInterface {

/**
* @var ConfigFactory $configFactory
*/

    protected $configFactory;

    /**
     * @param array $configuration
     * @param string $plugin_id
     * @param mixed $plugin_definition
     * @param \Drupal\Core\Session\ConfigFactory $configFactory 
     */

    public function __construct(array $configuration, $plugin_id, $plugin_definition, ConfigFactory $configFactory) {
        parent::__construct($configuration, $plugin_id, $plugin_definition);
        $this->formbuilder = $form_builder;
        $this->configfactory = $config_factory;
      }
 /**
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   * @param array $configuration
   * @param string $plugin_id
   * @param mixed $plugin_definition
   *
   * @return static
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('form_builder')
    );
  }

   /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
   // $build['drupalist_activate_block']['#markup'] = '<p>The Time is ' . $date = $this->date() . '</p>';

    return $build;
  }
  
    
}
