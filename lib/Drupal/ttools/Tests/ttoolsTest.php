<?php

/**
 * @file
 * Tests for ttools.module.
 */

namespace Drupal\ttools\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Provides automated tests for the ttools module.
 */
class ttoolsTest extends WebTestBase {

  public static function getInfo() {
    return array(
      'name' => 'ttools functionality',
      'description' => 'Test Untit for module ttools.',
      'group' => 'Other',
    );
  }

  function setUp() {
    parent::setUp();
  }

  /**
   * Tests ttools functionality.
   */
  function testttools() {
    //Check that the basic functions of module ttools.
    $this->assertEqual(TRUE, TRUE, 'Test Unit Generated via App Console.');
  }

}
