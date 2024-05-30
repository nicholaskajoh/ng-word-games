<?php

// Assuming you're using PHPUnit
use PHPUnit\Framework\TestCase;

require_once 'naija_guru.php'; // Include the file with get_story()

class Go extends TestCase
{

  /**
   * Test if get_story() returns a string
   */
  public function testGetStoryReturnsString()
  {
    $story = get_story();
    $this->assertIsString($story);
  }

  /**
   * Test if get_story() might return a story starting with "Once upon a time"
   */
  public function testGetStoryStartsWithOnceUponATime()
  {
    $story = get_story();
 
    $story = get_story();
    $this->assertStringContainsString('upon', $story, '', true); // Case-insensitive
  }
  // Add more test cases here to cover different scenarios
}

