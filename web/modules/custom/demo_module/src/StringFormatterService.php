<?php

namespace Drupal\demo_module;

class StringFormatterService {

  protected $adderService;

  public function __construct(AdderService $adderService) {
    $this->adderService = $adderService;
  }

  public function formatString($num1, $num2) {
    // Use the AdderService to add the numbers.
    $result = $this->adderService->addNumbers($num1, $num2);

    return t('The product of @num1 and @num2 is @additionResult', [
      '@num1' => $num1,
      '@num2' => $num2,
      '@additionResult' => $result,
    ]);
  }

}
