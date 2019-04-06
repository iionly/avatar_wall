<?php

return [
	'routes' => [
		'avatar_wall' => [
			'path' => '/avatar_wall/{tab?}',
			'resource' => 'avatar_wall/wall',
		],
	],
	'settings' => [
		'maxIcons' => 300,
		'onlyWithAvatar' => 'yes',
		'wallIconSize' => 'small',
	],
];
