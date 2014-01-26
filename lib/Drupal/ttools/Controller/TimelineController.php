<?php

namespace Drupal\ttools\Controller;

use Drupal\Core\Controller\ControllerBase;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Template\TwigEnvironment;

class TimelineController extends ControllerBase implements ContainerInjectionInterface {

  protected $twig;

  public function __construct(TwigEnvironment $twig) {
    $this->twig = $twig;
  }

  public static function create(ContainerInterface $container){
    return new static(
      $container->get('twig')    );
  }
  
  /**
   * helloAction
   * @param  string $name Get
   * @return [type]       [description]
   */
  public function timeline() {
   $configFactory = $this->config("ttools.settingsform_config");

    $config = [
      "consumer_key"        => $configFactory->get("consumer_key"),
      "consumer_secret"     => $configFactory->get("consumer_secret"),
      "access_token"        => $configFactory->get("access_token") ?: null,
      "access_token_secret" => $configFactory->get("access_token_secret") ?: null,
    ];

    $ttools = new \TTools\App($config);
    $screen_name = $configFactory->get("screen_name");
    $limit = $configFactory->get("limit") ?: 10;
    $stream = $ttools->getUserTimeline(null, $screen_name, $limit);

    $twigFilePath = drupal_get_path('module', 'ttools') . '/templates/timeline.html.twig';

    $template = $this->twig->loadTemplate($twigFilePath);

    return $template->render(array(
      'stream' => $stream
    ));
    
  }
  
}
