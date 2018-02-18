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
 * Checks if the Model works appropriately.
 */
class ModelTest extends TestCase
{
  /**
   * @Override
   */
  public function setUp()
  {
    parent::setUp();
  }

  /**
   * @Override
   */
  public function tearDown()
  {
    parent::tearDown();        
    Mockery::close();
  }
    
  public function testModel()
  {        
  }
}