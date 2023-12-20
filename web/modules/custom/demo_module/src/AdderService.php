<?php

namespace Drupal\demo_module;

class AdderService {

  public function addNumbers($num1, $num2) {
    return (float) $num1 + (float) $num2;
  }
}
