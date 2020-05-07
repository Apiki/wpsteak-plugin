<?php declare(strict_types = 1);

namespace App\Providers\Assets;

use WPSteak\Providers\AbstractHookProvider;
use WPSteak\Services\Assets;

class Theme extends AbstractHookProvider {

	use Assets;

	/**
	 * {@inheritDoc}
	 */
	public function register_hooks(): void {
		$this->add_action( 'wp_enqueue_scripts', 'enqueue' );
	}

	protected function enqueue(): void {
		$handle = "{$this->plugin->get_slug()}-theme";

		$this->enqueue_script(
			$handle,
			$this->plugin->get_url( 'dist/theme.js' ),
			$this->plugin->get_path( 'dist/theme.js' ),
			['jquery', 'wp-i18n'],
			true,
		);

		$this->enqueue_style(
			$handle,
			$this->plugin->get_url( 'dist/styles/theme.css' ),
			$this->plugin->get_path( 'dist/styles/theme.css' ),
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
			$this->plugin->get_path( 'languages' ),
		);
	}

}
