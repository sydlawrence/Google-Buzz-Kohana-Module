<?php defined('SYSPATH') or die('No direct access allowed.');

/**
 * Google Buzz API integration.
 *
 * As Google have not currently released an 'official' API, we must make do with their atom feed
 *
 * @package    googlebuzz
 * @author     Syd Lawrence
 * @copyright  (c) 2010 Syd Lawrence
 * @license    Licensed under the MIT license: http://www.opensource.org/licenses/mit-license.php
 */
class buzz_core {


	/**
	 * Get all the updates (and replies) for a specified user
	 *
	 * @param int/string $user - the user id
	 * @param boolean $formatted - format the data in a more usable manner (my personal opinion)
	 * @return array of updates
	 */
	public static function get_updates($user, $formatted = true) {
		$buzz_feed = "http://buzz.googleapis.com/feeds/$user/public/posted";
		$data = feed::parse($buzz_feed);
		if (!$formatted)
			return $data;
		$updates = array();

		foreach ($data as $d) {
			$updates[] = array(
				"date" => $d['published'],
				"content" => strip_tags($d['content']),
				"author" => $d['author'],
				"href" => $d['link'][0]['href'],
				"replies" => self::get_replies($d['link'][1]['href'])

			);

		}

		return $updates;
	}


	/**
	 * Get all the replies from a specified url
	 *
	 * @param string $href - replies feed url 
	 * @param boolean $formatted - format the data in a more usable manner (my personal opinion)
	 * @return array of replies
	 */
	public static function get_replies($href, $formatted = true) {
		$data = feed::parse($href);

		if (!$formatted)
			return $data;

		$replies = array();
		
		// format the data in a more organised manner (personal opinion)
		foreach ($data as $d) {
			$replies[] = array(
				"date" => $d['published'],
				"content" => $d['content'],
				"author" => $d['author']
			);
		}

		return $replies;
	}


}