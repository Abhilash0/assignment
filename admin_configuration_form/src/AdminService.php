<?php

namespace Drupal\admin_Configuration_form;

use Drupal\Core\Config\ConfigFactory;

/**
 * Class AdminService
 * @package Drupal\admin_Configuration_form\Services
 */
class AdminService {
  /**
  * Configuration Factory.
  *
  * @var \Drupal\Core\Config\ConfigFactory
  */

  protected $configFactory;

  /**
   * AdminService constructor.
   * @param ConfigFactory $configFactory
   */
  public function __construct(ConfigFactory $configFactory) {
    $this->configFactory = $configFactory;
  }


  /**
   * @return \Drupal\Component\Render\MarkupInterface|string
   */
  public function getTime() {
    $timezone = $this->configFactory->get('admin_Configuration_form.settings')->get('timezone');
    date_default_timezone_set($timezone);
    $date= 'The loation is ' .$timezone .' and the time '. date('dS M Y - g:i A') ;
    return $date;
  }
}
