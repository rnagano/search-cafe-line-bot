<?php
  /*
   * Copyright (c) AllAbout, Inc.
   * This project has been initiated under the
   * belief of simple and yet universal system
   * design driving customers' business efficiency.
   */

  // Debugs out the specified value onto the browser.
if (!function_exists('pr')) {
  function pr($value, $pass=false) {
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    if (!$pass) {
      exit();
    }
  }
}

// Debugs out the specified value onto the browser.
if (!function_exists('vd')) {
  function vd($value, $pass=false) {
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    if (!$pass) {
      exit();
    }
  }
}