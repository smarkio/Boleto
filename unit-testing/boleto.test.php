<?php
/**
 * @file
 * Unit testing.
 */

require_once 'simpletest/autorun.php';
require_once "../../../Boleto.class.php";

/**
 * Tutorial at http://www.simpletest.org/en/first_test_tutorial.html.
 */
abstract class BoletoTestCase extends UnitTestCase {
  protected $boletoObject;
  protected $bank_code;
  protected $plugin_class_file;
  protected $plugin_class_name;
  protected $plugin_simpletest_class_name;
  protected $febraban;

  function __construct() {

    $this->plugin_simpletest_class_name = $plugin_simpletest_class_name = get_called_class();

    $bank_code = explode('TestOf', $plugin_simpletest_class_name);
    // Get the second part of the explosion debris.
    $bank_code = $this->bank_code = $bank_code[1];

    $arguments = array('bank_code' => $bank_code);

    if (method_exists($this, 'mockingArguments')) {
      $this->mockingArguments();
      // Use the mockary data from the plugin implementation.
      $arguments = $this->mockingArguments;
    }

    if (file_exists("../Banco_$bank_code.php")) {
      $this->plugin_class_name = "Banco_$bank_code";

      $plugin_class_file = $this->plugin_class_file = "../Banco_$bank_code.php";
      
      include_once $plugin_class_file;
  
      $this->boletoObject = Boleto::load_boleto($arguments);

      $this->febraban = $this->getReflectedPropertyValue($this->boletoObject, 'febraban');
    }
  }

  /**
   * Removes the "protected" lock from a protected property.
   *
   * @param String | Object $class
   *   This is either a class name or an instantiated object.
   * @param String $propertyName
   *   The name of the property that is going to get its value unlocked.
   *
   * @return Mix
   *   The property value.
   */
  public static function getReflectedPropertyValue($class, $propertyName) {
    $reflectedClass = new ReflectionClass($class);
    $property = $reflectedClass->getProperty($propertyName);

    // The setAccessible method works only from PHP 5.3 or higher.
    $property->setAccessible(true);
 
    return $property->getValue($class);
  }

  /**
   * You must have PHP 5.3 or higher running.
   * This is not a requirement for using the Boleto Library but for running
   * some of these unit tests.
   */
  function testYouMustHavePHP53RunningForThisSimpleTestToWork() {
    $is_53 = (strnatcmp(phpversion(),'5.3.0') >= 0) ? TRUE : FALSE;
    $this->assertTrue($is_53);
  }

  function testTheBankCodeArgumentIsTheSameAsCodeInTheSimpleTestClassName() {
    $this->assertEqual($this->mockingArguments['bank_code'], $this->bank_code);
  }

  function testPluginClassFileExists() {
    $this->assertTrue(file_exists($this->plugin_class_file));
  }

  function testPluginClassExists() {
    $this->assertTrue(class_exists($this->plugin_class_name));
  }

  function testBoletoObjectsHasBeenInstantiated() {
    $this->assertTrue(is_object($this->boletoObject));
  }

  function testFebraban20to44MethodExists() {
    $this->assertTrue(method_exists($this->boletoObject, 'febraban_20to44'));
  }

  function testMockingArgumentsExists() {
    $this->assertTrue(method_exists($this->plugin_simpletest_class_name, 'mockingArguments'));
  }

  function testMockingArgumentsPropertyIsAnArrayAndIsPopulated() {
    $this->assertTrue(is_array($this->mockingArguments));
    $this->assertFalse(empty($this->mockingArguments));
  }

  function testFebraban20to44PropertyHas15Digits() {
    $this->assertTrue(is_numeric($this->febraban['20-44']));
    $this->assertTrue(strlen($this->febraban['20-44']) == 14);
  }
}
