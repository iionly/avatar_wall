<?php

$selected_tab = elgg_extract('tab', $vars, 'today');
$tabs = ['today', 'week', 'all'];
$params = [
	'tabs' => [],
];

foreach ($tabs as $tab) {
	$params['tabs'][] = [
		'title' => elgg_echo("avatar_wall:{$tab}"),
		'url' => "avatar_wall/{$tab}",
		'selected' => ($tab === $selected_tab),
	];
}

$content = elgg_view('navigation/tabs', $params);

if (elgg_view_exists("avatar_wall/{$selected_tab}")) {
	$content .= elgg_view("avatar_wall/{$selected_tab}");
}

// Format page
$body = elgg_view('page/layouts/default', [
	'content' => $content,
	'title' => elgg_echo('avatar_wall:title'),
	'sidebar' => false,
	'breadcrumbs' => [
		[
			'text' => elgg_echo('avatar_wall:title'),
			'href' => 'avatar_wall/today',
		],
	],
]);

// Draw it
echo elgg_view_page(elgg_echo('avatar_wall:title'), $body);
