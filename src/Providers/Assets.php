<?php
/**
 * Assets.
 *
 * @package App
 */

declare(strict_types=1);

namespace App\Providers;

use WPSteak\Providers\AbstractHookProvider;
use WPSteak\Services;

/**
 * Assets class.
 */
class Assets extends AbstractHookProvider {

	use Services\Assets;

	/**
	 * Register hooks.
	 *
	 * @return void
	 */
	public function register_hooks() {
		$this->add_action( 'wp_enqueue_scripts', 'register_theme_assets' );
		$this->add_action( 'admin_enqueue_scripts', 'register_admin_assets' );
		$this->add_action( 'login_enqueue_scripts', 'register_login_assets' );
		$this->add_action( 'enqueue_block_editor_assets', 'register_editor_assets' );
	}

	/**
	 * Register theme assets
	 *
	 * @return void
	 */
	protected function register_theme_assets() {
		$this->enqueue_script(
			'app-theme-js',
			$this->plugin->get_url( 'dist/theme.js' ),
			$this->plugin->get_path( 'dist/theme.js' ),
			[ 'jquery', 'wp-i18n' ],
			true
		);

		$this->enqueue_style(
			'app-theme-css',
			$this->plugin->get_url( 'dist/styles/theme.css' ),
			$this->plugin->get_path( 'dist/styles/theme.css' )
		);
	}

	/**
	 * Register admin assets.
	 *
	 * @return void
	 */
	protected function register_admin_assets() {
		$this->enqueue_script(
			'app-admin-js',
			$this->plugin->get_url( 'dist/admin.js' ),
			$this->plugin->get_path( 'dist/admin.js' ),
			[ 'jquery', 'wp-i18n' ],
			true
		);

		$this->enqueue_style(
			'app-admin-css',
			$this->plugin->get_url( 'dist/styles/admin.css' ),
			$this->plugin->get_path( 'dist/styles/admin.css' )
		);

		$this->script_translation();
	}

	/**
	 * Register login assets.
	 *
	 * @return void
	 */
	protected function register_login_assets() {
		$this->enqueue_script(
			'app-login-js',
			$this->plugin->get_url( 'dist/login.js' ),
			$this->plugin->get_path( 'dist/login.js' ),
			[ 'jquery' ],
			true
		);

		$this->enqueue_style(
			'app-login-css',
			$this->plugin->get_url( 'dist/styles/login.css' ),
			$this->plugin->get_path( 'dist/styles/login.css' )
		);
	}

	/**
	 * Register editor assets.
	 *
	 * @return void
	 */
	protected function register_editor_assets() {
		$this->enqueue_script(
			'app-editor-js',
			$this->plugin->get_url( 'dist/editor.js' ),
			$this->plugin->get_path( 'dist/editor.js' ),
			[ 'wp-blocks', 'wp-element', 'wp-i18n' ],
			true
		);

		$this->enqueue_style(
			'app-editor-css',
			$this->plugin->get_url( 'dist/styles/editor.css' ),
			$this->plugin->get_path( 'dist/styles/editor.css' )
		);
	}

	/**
	 * Script translation.
	 *
	 * @return void
	 */
	protected function script_translation() {
		if ( ! function_exists( 'wp_set_script_translations' ) ) {
			return;
		}

		wp_set_script_translations( 'app-admin-js-bundle', $this->plugin->get_slug(), $this->plugin->get_path( 'languages' ) );
	}
}
