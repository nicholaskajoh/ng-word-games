<?php
require_once 'naija_guru.php';
 
/**
 * Class SampleTest
 *
 * @package Ng_Word_Games
 */
 
/**
 * Sample test case.
 */
class SampleTest extends get_story(){
 	/**
	 * A single example test.
	 */
	   function testGetStory()
    {
         $story = get_story();
 
         $this->assertIsString($story);
 
         if($this->assertStringContainsStringIgnoringCase('Once upon a time', $story)):
 
				endif;
 
    }
}