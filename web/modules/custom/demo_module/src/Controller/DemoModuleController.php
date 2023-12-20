<?php

namespace Drupal\demo_module\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\demo_module\StringFormatterService;
use Symfony\Component\HttpFoundation\Request;

class DemoModuleController extends ControllerBase {

  protected $stringFormatterService;

  public function __construct(StringFormatterService $stringFormatterService) {
    $this->stringFormatterService = $stringFormatterService;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('demo_module.string_formatter')
    );
  }

  public function content(float $num1 = null, float $num2 = null) {
    // If parameters are not provided in the URL, use default values.
    $num1 = isset($num1) ? $num1 : 100;
    $num2 = isset($num2) ? $num2 : 125;
    $result = null;

    $output = $this->stringFormatterService->formatString($num1, $num2, $result);

    return [
      '#markup' => $output,
    ];
  }
}
