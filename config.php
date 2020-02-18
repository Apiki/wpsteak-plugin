<?php declare(strict_types = 1);

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
		App\Services\Meta\ServiceProvider::class,
	],
	'hook_providers'    => [
		App\Providers\Assets\Admin::class,
		App\Providers\Assets\Editor::class,
		App\Providers\Assets\Login::class,
		App\Providers\Assets\Theme::class,
		App\Providers\ExampleCategory\Taxonomy::class,
		App\Providers\Example\PostMeta::class,
		App\Providers\Example\PostType::class,
	],
];
