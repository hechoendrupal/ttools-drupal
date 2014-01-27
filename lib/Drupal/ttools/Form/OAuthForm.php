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

class OAuthForm extends ConfigFormBase implements FormInterface, ContainerInjectionInterface {


  public function __construct( ConfigFactory $config_factory) {
        parent::__construct($config_factory);
  }

  public static function create(ContainerInterface $container){
    return new static($container->get('config.factory'));
  }
  
  /**
   * {@inheritdoc}
   */
  public function getFormID() {
    return 'oauthform_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, array &$form_state) {
    $config = $this->configFactory->get('ttools.oauthform_config');
    $form['consumer_key'] = array(
      '#type' => 'textfield',
      '#title' => t('Consumer Key'),
      '#description' => t(''),
      '#default_value' => $config->get('consumer_key')
    );
    $form['consumer_secret'] = array(
      '#type' => 'textfield',
      '#title' => t('Consumer Secret'),
      '#description' => t(''),
      '#default_value' => $config->get('consumer_secret')
    );
    $form['access_token'] = array(
      '#type' => 'textfield',
      '#title' => t('Access Token'),
      '#description' => t(''),
      '#default_value' => $config->get('access_token')
    );
    $form['access_token_secret'] = array(
      '#type' => 'textfield',
      '#title' => t('Access Token Secret'),
      '#description' => t(''),
      '#default_value' => $config->get('access_token_secret')
    );
    $form['screen_name'] = array(
      '#type' => 'textfield',
      '#title' => t('Screen Name'),
      '#description' => t(''),
      '#default_value' => $config->get('screen_name')
    );
    $form['limit'] = array(
      '#type' => 'number',
      '#title' => t('Limit'),
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

    $this->configFactory->get('ttools.oauthform_config')
          ->set('consumer_key', $form_state['values']['consumer_key'])
          ->set('consumer_secret', $form_state['values']['consumer_secret'])
          ->set('access_token', $form_state['values']['access_token'])
          ->set('access_token_secret', $form_state['values']['access_token_secret'])
          ->set('screen_name', $form_state['values']['screen_name'])
          ->set('limit', $form_state['values']['limit'])
        ->save();
  }

}
