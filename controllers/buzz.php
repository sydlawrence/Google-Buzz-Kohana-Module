<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Example Google Buzz Controller
 *
 * @package    googlebuzz
 * @author     Syd Lawrence
 * @copyright  (c) 2010 Syd Lawrence
 * @license    Licensed under the MIT license: http://www.opensource.org/licenses/mit-license.php
 */
class Buzz_Controller extends Template_Controller {

	const ALLOW_PRODUCTION = FALSE;

	// Set the name of the template to use
	public $template = 'buzz.example';

	public function index($user = "sydlawrence")
	{
		// get the posts from the specified user
		$this->template->posts = buzz::get_updates($user);
		
	}

	public function __call($method, $arguments)
	{
		$this->index($method);
	}
	

} // End Buzz Controller