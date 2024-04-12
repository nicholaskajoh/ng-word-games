<?php
/**
 * @package Naija Guru 
 * @version 1.0
 */
/*
Plugin Name: Naija Guru stories
Description: Engage your audience with an  interactive pidgen story with  emojis for added excitement.
Version: 1.0
Author: Naija Guru 
*/

function get_story()
{
	$story = "

Once upon a time, for inside one small village 🏘️, dey live one plenti plenti kin animals 🐓🐄🐖. Dem get one big farm 🌾 wey all of dem dey chop together, and e be like say dem dey enjoy. 

One day, na so one big big rat 🐀 show face for di farm, e come dey chop all di farm wey dem dey plant. Di animals vex scatter, dem wan find solution to chase di rat comot. 🤔

After plenty plenty plan, na so dem call one smart cat 🐱 wey dey nearby to come help dem. As di cat land, e just catch di rat sharp sharp! 🐾

From dat day, dem no get problem for di farm again. Di animals happy sotay dem dey laugh, and di cat just dey siddon proud say e don solve di mata. 😄

And so, peace return to di small village, and di animals continue to chop deir farm with joy. Na here e finish hope say the story make brain

";


 	return wptexturize($story);
}

function story_shortcode()
{
	$chosen = get_story();
	return "<p id='story_shortcode'>$chosen</p>";
}
add_shortcode('story_guru_shortcode', 'story_shortcode');

function display_story_in_content($content)
{
	if (has_shortcode($content, 'story_guru_shortcode')) {
		$content .= story_shortcode();
	}
	return $content;
}
add_filter('the_content', 'display_story_in_content');
?>
