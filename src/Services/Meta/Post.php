<?php
/**
 * Post.
 *
 * @package App
 */

namespace App\Services\Meta;

/**
 * Post class.
 */
class Post implements PostInterface {

	/**
	 * {@inheritDoc}
	 *
	 * @param integer $id Id.
	 * @param string  $key Key.
	 * @param boolean $single Single.
	 * @return mixed
	 */
	public function get( int $id, string $key, bool $single = false ) {
		return get_post_meta( $id, $key, $single );
	}

	/**
	 * {@inheritDoc}
	 *
	 * @param integer $id Id.
	 * @param string  $key Key.
	 * @param mixed   $value Value.
	 * @return void
	 */
	public function set( int $id, string $key, $value ) {
		update_post_meta( $id, $key, $value );
	}
}
