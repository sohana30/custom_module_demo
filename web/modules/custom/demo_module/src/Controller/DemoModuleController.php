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

  public function content($num1, $num2) {
    if (!is_numeric($num1) || !is_numeric($num2)) {
      $output = 'Please provide number in num1 and num2 path "/demo-module/endpoint/numb1/numb2"';
    } else {
      $output = $this->stringFormatterService->formatString($num1, $num2);
    }
    
    return [
      '#markup' => $output,
    ];
  }
}
