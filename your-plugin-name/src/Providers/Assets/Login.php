<?php
/**
 * Login.
 *
 * @package App
 */

declare(strict_types=1);

namespace App\Providers\Assets;

use WPSteak\Providers\AbstractHookProvider;
use WPSteak\Services\Assets;

/**
 * Login class.
 */
class Login extends AbstractHookProvider {

	use Assets;

	/**
	 * Register hooks.
	 *
	 * @return void
	 */
	public function register_hooks() {
		$this->add_action( 'login_enqueue_scripts', 'enqueue' );
	}

	/**
	 * Enqueue.
	 *
	 * @return void
	 */
	protected function enqueue() {
		$handle = "{$this->plugin->get_slug()}-login";

		$this->enqueue_script(
			$handle,
			$this->plugin->get_url( 'dist/login.js' ),
			$this->plugin->get_path( 'dist/login.js' ),
			[ 'jquery', 'wp-i18n' ],
			true
		);

		$this->enqueue_style(
			$handle,
			$this->plugin->get_url( 'dist/styles/login.css' ),
			$this->plugin->get_path( 'dist/styles/login.css' )
		);

		if ( ! function_exists( 'wp_set_script_translations' ) ) {
			return;
		}

		/**
		 * The `.json` file must be on following format: domain-locale-handler.json
		 * You can generate this file with `po2json`
		 */
		wp_set_script_translations(
			$handle,
			$this->plugin->get_slug(),
			$this->plugin->get_path( 'languages' )
		);
	}
}
