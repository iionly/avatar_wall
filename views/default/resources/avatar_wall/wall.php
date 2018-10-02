<?php

$selected_tab = get_input('tab', 'today');
$tabs = ['today', 'week', 'all'];
$params = [
	'tabs' => [],
];

elgg_push_breadcrumb(elgg_echo('avatar_wall:title'));

foreach ($tabs as $tab) {
	$params['tabs'][] = [
		'title' => elgg_echo("avatar_wall:{$tab}"),
		'url' => elgg_http_add_url_query_elements('avatar_wall/wall', ['tab' => $tab]),
		'selected' => ($tab === $selected_tab),
	];
}

$content = elgg_view('navigation/tabs', $params);

if (elgg_view_exists("avatar_wall/{$tab}")) {
	$content .= elgg_view("avatar_wall/{$tab}");
}

// Format page
$body = elgg_view('page/layouts/one_column', [
	'content' => $content,
	'title' => elgg_echo('avatar_wall:title'),
]);

// Draw it
echo elgg_view_page(elgg_echo('avatar_wall:title'), $body);
