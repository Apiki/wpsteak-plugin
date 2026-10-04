<?php declare(strict_types = 1);

/**
 * WP Steak
 *
 * @package App
 *
 * Plugin Name: WP Steak
 * Description: A fully structured plugin.
 * Version: 3.0.1
 * Author: Apiki
 * Author URI: https://apiki.com/
 * Text Domain: app
 * Domain Path: /languages
 * Requires PHP: 7.4
 */

use Cedaro\WP\Plugin\Plugin;
use Cedaro\WP\Plugin\PluginFactory;
use Cedaro\WP\Plugin\Provider\I18n;
use League\Container\Container;
use League\Container\ReflectionContainer;
use WPSteak\Providers\I18n as WPSteakI18n;

/**
 * Retrieve the main plugin instance.
 */
function wpsteak(): Plugin {
	static $instance;

	if ( null === $instance ) {
		$instance = PluginFactory::create( 'app' );
	}

	return $instance;
}

/**
 * Load and run the plugin.
 */
function wpsteak_load(): void {
	if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
		require __DIR__ . '/vendor/autoload.php';
	}

	$container = new Container();

	// Register the reflection container as a delegate to enable auto wiring.
	$container->delegate(
		( new ReflectionContainer() )->cacheResolutions(),
	);

	$plugin = wpsteak();

	$plugin->set_container( $container );
	$plugin->register_hooks( $container->get( I18n::class ) );
	$plugin->register_hooks( $container->get( WPSteakI18n::class ) );

	$config = ( require __DIR__ . '/config.php' );

	foreach ( $config['service_providers'] as $service_provider ) {
		$container->addServiceProvider( $service_provider );
	}

	foreach ( $config['hook_providers'] as $hook_provider ) {
		$plugin->register_hooks( $container->get( $hook_provider ) );
	}
}

add_action( 'plugins_loaded', 'wpsteak_load', 0, 0 );
