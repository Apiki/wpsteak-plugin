<?php
/**
 * Editor.
 *
 * @package App
 */

declare(strict_types=1);

namespace App\Providers\Assets;

use WPSteak\Providers\AbstractHookProvider;
use WPSteak\Services\Assets;

/**
 * Editor class.
 */
class Editor extends AbstractHookProvider {

	use Assets;

	/**
	 * Register hooks.
	 *
	 * @return void
	 */
	public function register_hooks() {
		$this->add_action( 'enqueue_block_editor_assets', 'enqueue' );
	}

	/**
	 * Enqueue.
	 *
	 * @return void
	 */
	protected function enqueue() {
		$handle = "{$this->plugin->get_slug()}-editor";

		$this->enqueue_script(
			$handle,
			$this->plugin->get_url( 'dist/editor.js' ),
			$this->plugin->get_path( 'dist/editor.js' ),
			[ 'jquery', 'wp-i18n' ],
			true
		);

		$this->enqueue_style(
			$handle,
			$this->plugin->get_url( 'dist/styles/editor.css' ),
			$this->plugin->get_path( 'dist/styles/editor.css' )
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
