<?php
/**
 * Avatar Wall
 *
 * @package avatar_wall
 * @author ColdTrick IT Solutions
 * @copyright Coldtrick IT Solutions 2009-2014
 * @link http://www.coldtrick.com/
 *
 * for Elgg 1.8 and newer by iionly (iionly@gmx.de)
 */

elgg_register_event_handler('init', 'system', 'avatar_wall_init');

function avatar_wall_init() {

	// Register a page handler, so we can have nice URLs
	elgg_register_page_handler('avatar_wall', 'avatar_wall_page_handler');

	// Extend system CSS with our own styles
	elgg_extend_view('elgg.css','avatar_wall/avatar_wall.css');

	elgg_register_menu_item('site', [
		'name' => elgg_echo('avatar_wall:shorttitle'),
		'text' => elgg_echo('avatar_wall:shorttitle'),
		'href' => elgg_get_site_url() . 'avatar_wall',
	]);
}

function avatar_wall_page_handler() {
	$tab = get_input('tab', 'today');
	echo elgg_view_resource('avatar_wall/wall', ['tab' => $tab]);
	return true;
}
