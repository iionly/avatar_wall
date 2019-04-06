<?php

use Elgg\Database\QueryBuilder;
use Elgg\Database\Clauses\OrderByClause;

$users_max = (int) elgg_get_plugin_setting('maxIcons', 'avatar_wall');
$onlyWithAvatar = elgg_get_plugin_setting('onlyWithAvatar', 'avatar_wall');
$wallIconSize = elgg_get_plugin_setting('wallIconSize', 'avatar_wall');

$time = time() - 86400;
$params = [
	'type' => 'user',
	'limit' => $users_max,
	'wheres' => function(QueryBuilder $qb) use ($time) {
		return $qb->compare('e.last_action', '>=', $time, ELGG_VALUE_INTEGER);
	},
	'order_by' => new OrderByClause('e.last_action', 'DESC'),
];

if ($onlyWithAvatar == "yes") {
	$params['metadata_name'] = 'icontime';
}

$users = elgg_get_entities($params);

shuffle($users);

echo "<div align='center'>";
foreach($users as $user) {
	echo elgg_format_element('a', ['href' => $user->getURL()], elgg_format_element('img', ['class' => 'wall_icons', 'alt' => $user->name, 'src' => $user->getIconURL($wallIconSize)], ''));
}
echo "</div>";
