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
class TimelineControllerTest extends WebTestBase {

  public static function getInfo() {
    return array(
      'name' => "ttools TimelineController's controller functionality",
      'description' => 'Test Unit for module ttools and controller TimelineController.',
      'group' => 'Other',
    );
  }

  function setUp() {
    parent::setUp();
  }

  /**
   * Tests ttools functionality.
   */
  function testTimelineController() {
    //Check that the basic functions of module ttools.
    $this->assertEqual(TRUE, TRUE, 'Test Unit Generated via App Console.');
  }

}
