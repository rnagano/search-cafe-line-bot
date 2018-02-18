<?php
/*
 * Copyright (c) AllAbout, Inc.
 * This project has been initiated under the
 * belief of simple and yet universal system
 * design driving customers' business efficiency.
 */
//namespace N/A

use \Mockery;

/**
 * Checks if the HomeController works appropriately.
 */
class HomeControllerTest extends TestCase
{
  /**
   * @override
   */
  public function setUp()
  {
    parent::setUp();
  }

  /**
   * @override
   */
  public function tearDown()
  {
    parent::tearDown();
    Mockery::close();
  }
  
  public function testIndex()
  {
  }
}