<?php

/**
 * @file
 * Contains \Drupal\ttools\Form\SettingsForm.
 */

namespace Drupal\ttools\Form;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Form\FormInterface;
use Drupal\Core\Form\ConfigFormBase;

class SettingsForm extends ConfigFormBase implements FormInterface, ContainerInjectionInterface {


  public function __construct( ConfigFactory $config_factory) {
        parent::__construct($config_factory);
          }

  public static function create(ContainerInterface $container){
    return new static(
            $container->get('config.factory')        );
  }
  
  /**
   * {@inheritdoc}
   */
  public function getFormID() {
    return 'settingsform_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, array &$form_state) {
    $config = $this->configFactory->get('ttools.settingsform_config');
    $form['consumer_key'] = array(
      '#type' => 'textfield',
      '#title' => t('consumer Key'),
      '#description' => t(''),
      '#default_value' => $config->get('consumer_key')
    );
    $form['consumer_secret'] = array(
      '#type' => 'textfield',
      '#title' => t('consumer_secret'),
      '#description' => t(''),
      '#default_value' => $config->get('consumer_secret')
    );
    $form['access_token'] = array(
      '#type' => 'textfield',
      '#title' => t('access_token'),
      '#description' => t(''),
      '#default_value' => $config->get('access_token')
    );
    $form['access_token_secret'] = array(
      '#type' => 'textfield',
      '#title' => t('access_token_secret'),
      '#description' => t(''),
      '#default_value' => $config->get('access_token_secret')
    );
    $form['screen_name'] = array(
      '#type' => 'textfield',
      '#title' => t('screen_name'),
      '#description' => t(''),
      '#default_value' => $config->get('screen_name')
    );
    $form['limit'] = array(
      '#type' => 'number',
      '#title' => t('limit'),
      '#description' => t(''),
      '#default_value' => $config->get('limit')
    );
     return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, array &$form_state) {
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, array &$form_state) {
    parent::submitForm($form, $form_state);

    $this->configFactory->get('ttools.settingsform_config')
          ->set('consumer_key', $form_state['values']['consumer_key'])
          ->set('consumer_secret', $form_state['values']['consumer_secret'])
          ->set('access_token', $form_state['values']['access_token'])
          ->set('access_token_secret', $form_state['values']['access_token_secret'])
          ->set('screen_name', $form_state['values']['screen_name'])
          ->set('limit', $form_state['values']['limit'])
        ->save();
  }

}
