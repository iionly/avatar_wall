<?php
/**
 * Avatar Wall - Admin settings
 *
 * @package avatar_wall
 * @author ColdTrick IT Solutions
 * @copyright Coldtrick IT Solutions 2009-2014
 * @link http://www.coldtrick.com/
 *
 * for Elgg 1.8 and newer by iionly (iionly@gmx.de)
*/

$entity = elgg_extract('entity', $vars);

echo elgg_view_field([
	'#type' => 'select',
	'#label' => elgg_echo("avatar_wall:settings:onlywithavatar"),
	'name' => 'params[onlyWithAvatar]',
	'options_values' => [
		'yes' => elgg_echo('option:yes'),
		'no' => elgg_echo('option:no'),
	],
	'value' => $entity->onlyWithAvatar ? : 'yes',
]);

echo elgg_view_field([
	'#type' => 'select',
	'#label' => elgg_echo("avatar_wall:settings:iconsize"),
	'name' => 'params[wallIconSize]',
	'options_values' => [
		'tiny' => elgg_echo('avatar_wall:settings:tiny'),
		'small' => elgg_echo('avatar_wall:settings:small'),
		'medium' => elgg_echo('avatar_wall:settings:medium'),
	],
	'value' => $entity->wallIconSize ? : 'small',
]);

echo elgg_view_field([
	'#type' => 'number',
	'#label' => elgg_echo("avatar_wall:settings:maxicons"),
	'name' => 'params[maxIcons]',
	'value' => (int) $entity->maxIcons ? : 300,
	'min' => 1,
	'step' => 1,
]);
