<?php

$users_max = (int) elgg_get_plugin_setting("maxIcons", "avatar_wall", 300);
$onlyWithAvatar = elgg_get_plugin_setting("onlyWithAvatar", "avatar_wall", "yes");
$wallIconSize = elgg_get_plugin_setting("wallIconSize", "avatar_wall", "small");

if ($onlyWithAvatar == "no") {
	$users = elgg_get_entities([
		'type' => 'user',
		'limit' => $users_max,
	]);
} else {
	$users = elgg_get_entities_from_metadata([
		'metadata_name' => 'icontime',
		'type' => 'user',
		'limit' => $users_max,
	]);
}

shuffle($users);

echo "<div align='center'>";
foreach($users as $user) {
	echo elgg_format_element('a', ['href' => $user->getURL()], elgg_format_element('img', ['class' => 'wall_icons', 'alt' => $user->name, 'src' => $user->getIconURL($wallIconSize)], ''));
}
echo "</div>";
