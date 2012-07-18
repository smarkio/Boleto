<?php
/**
 * @file
 * Unit testing.
 */

require_once 'simpletest/autorun.php';
require_once "../Boleto.class.php";

/**
 * Tutorial at http://www.simpletest.org/en/first_test_tutorial.html.
 */
class BoletoTestCase extends UnitTestCase {
  protected $boletoObject = array();
  protected $bank_codes;

  function __construct() {
    if (isset($_GET['bank_code'])) {
      // We are testing only one plugin.
      $bank_codes = array(trim($_GET['bank_code']));
    }
    else {
      // Test all installed plugins.
      $bank_codes = Boleto::installedPlugins();
    }

    $this->bank_codes = $bank_codes;

    foreach ($bank_codes as $bank_code) {
      $this->boletoObject[$bank_code] = Boleto::load_boleto(array('bank_code' => $bank_code));
    }
  }

  function testHavePluginsInstalled() {
    foreach ($this->bank_codes as $bank_code) {
      $plugin_file_class = "../bancos/$bank_code/Banco_$bank_code.php";
      $this->assertTrue(file_exists($plugin_file_class));

      // Include files for next test.
      if (file_exists($plugin_file_class)) {
        include_once $plugin_file_class;
      }
    }
  }

  function testPluginClassesExist() {
    foreach ($this->bank_codes as $bank_code) {
      $this->assertTrue(class_exists("Banco_$bank_code"));
    }
  }

  function testBoletoObjectsHaveBeenInstantiated() {
    foreach ($this->boletoObject as $boletoObject) {
      $this->assertTrue(is_object($boletoObject));
    }
  }

  function testPluginsHaveSimpleTest() {
    
  }
}
