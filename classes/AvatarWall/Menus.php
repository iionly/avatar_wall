<?php

namespace AvatarWall;

use Elgg\Menu\MenuItems;

class Menus {

	/**
	 * Add a menu item to the site menu
	 *
	 * @param \Elgg\Hook $hook 'register', 'menu:site'
	 *
	 * @return void|MenuItems
	 */
	public static function AvatarWallSitemenu(\Elgg\Hook $hook) {
		$return_value = $hook->getValue();
		$return_value[] = \ElggMenuItem::factory([
			'name' => 'avatarwall',
			'text' => elgg_echo('avatar_wall:shorttitle'),
			'href' => 'avatar_wall/today',
			'icon' => 'user-ninja',
		]);
		
		return $return_value;
	}
}
