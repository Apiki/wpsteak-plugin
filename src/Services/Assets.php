<?php
/**
 * Assets.
 *
 * @link https://github.com/htmlburger/wpemerge-theme-core/blob/master/src/Assets/Assets.php
 * @package App
 */

declare(strict_types=1);

namespace App\Services;

/**
 * Assets trait.
 */
trait Assets {
	/**
	 * Generate a version for a given file.
	 *
	 * @param  string $file_path The file path.
	 * @return integer|boolean
	 */
	protected function generate_file_version( $file_path ) {
		$version = false;

		if ( $file_path && file_exists( $file_path ) ) {
			$version = filemtime( $file_path );
		}

		return $version;
	}

	/**
	 * Enqueue a style, dynamically generating a version for it.
	 *
	 * @param  string   $handle The handle for enqueue.
	 * @param  string   $src The file src.
	 * @param  string   $file The file path.
	 * @param  string[] $dependencies Dependencies for this file.
	 * @param  string   $media The media.
	 * @return void
	 */
	public function enqueue_style( $handle, $src, $file = '', $dependencies = [], $media = 'all' ) {
		wp_enqueue_style( $handle, $src, $dependencies, $this->generate_file_version( $file ), $media );
	}

	/**
	 * Enqueue a script, dynamically generating a version for it.
	 *
	 * @param  string   $handle The handle for enqueue.
	 * @param  string   $src The file src.
	 * @param  string   $file The file path.
	 * @param  string[] $dependencies Dependencies for this file.
	 * @param  boolean  $in_footer The media.
	 * @return void
	 */
	public function enqueue_script( $handle, $src, $file = '', $dependencies = [], $in_footer = false ) {
		wp_enqueue_script( $handle, $src, $dependencies, $this->generate_file_version( $file ), $in_footer );
	}
}
