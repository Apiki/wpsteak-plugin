<?php
/**
 * Config.
 *
 * Define configurations for this plugin,
 * use it for define your service providers and hooks providers,
 * the classes will be loaded in order as defined.
 *
 * @package App
 */

return [
	'service_providers' => [
		App\Services\PostMeta\ServiceProvider::class,
	],
	'hook_providers'    => [
		App\Providers\Assets::class,
	],
];
