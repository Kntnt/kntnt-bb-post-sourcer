<?php

/**
 * @wordpress-plugin
 * Plugin Name:       Kntnt's Post Sourcer for Beaver Builder
 * Plugin URI:        https://github.com/Kntnt/kntnt-bb-post-sourcer
 * Description:       Provides a hook that allows developers to add new content sources for Beaver Builder's Post, Post Slider and Post Carousel modules.
 * Version:           1.0.0
 * Author:            Thomas Barregren
 * Author URI:        https://www.kntnt.com/
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 */

namespace Kntnt\BB_Post_Sourcer;

defined( 'WPINC' ) || die;

require_once __DIR__ . '/classes/class-plugin.php';

new Plugin( [
	'public' => [
		'init' => [
			'UI',
			'Sourcer',
		],
	],
	'ajax' => [
		'admin_init' => [
			'Sourcer',
		],
	],
] );