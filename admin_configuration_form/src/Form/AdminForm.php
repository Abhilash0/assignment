<?php

namespace Drupal\admin_configuration_form\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * Our admin form class.
 */

class AdminForm extends ConfigFormBase {
  
  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'admin_configuration_form.settings'
    ];
  }
  /**
   * {@inheritdoc}
   * 
   */

  public function getFormId() {
    return 'admin_form';
    
  }

  /**
   * {@inheritdoc}
   */

  
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('admin_configuration_form.settings');
    $form['country'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Country Name'),
      '#default_value' => $config->get('country'),
    ];
    $form['city'] = [
      '#type' => 'textfield',
      '#title' => $this->t('City Name'),
      '#default_value' => $config->get('city'),
    ];
    $form['timezone'] = array(
      '#type' => 'select',
      '#title' => t('Select your region.'),
      '#options' => array(
                            'America/Chicago' => t('America/Chicago'),
                            'America/New_York' => t('America/New_York'),
                            'Asia/Tokyo' => t('Asia/Tokyo'),
                            'Asia/Dubai' => t('Asia/Dubai'),
                            'Asia/Kolkata' => t('Asia/Kolkata'),
                            'Europe/Amsterdam' => t('Europe/Amsterdam'),
                            'Europe/Oslo' => t('Europe/Oslo'),
                            'Europe/London' => t('Europe/London')
      ),
      '#default_value' => $config->get('timezone'),
      '#description' => t("The region You want to select."),
  );
    
    return parent::buildForm($form, $form_state);
  
  }
   /**
   * {@inheritdoc}
   * 
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
  parent::submitForm($form, $form_state);
    $this->config('admin_configuration_form.settings')
    ->set('country', $form_state->getValue('country'))
    ->set('city', $form_state->getValue('city'))
    ->set('timezone', $form_state->getValue('timezone'))
    ->save();
   
 }
}