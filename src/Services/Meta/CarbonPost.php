<?php
/**
 * Carbon Post.
 *
 * @package App
 */

declare(strict_types=1);

namespace App\Services\Meta;

use WPSteak\Services\Meta\IMeta;
use WPSteak\Services\Meta\PostInterface;

/**
 * Carbon Post class.
 *
 * @codeCoverageIgnore
 */
class CarbonPost implements PostInterface {

	/**
	 * Get.
	 *
	 * @param integer $id Id.
	 * @param string  $key Key.
	 * @param boolean $single Single.
	 * @return mixed
	 */
	public function get( int $id, string $key, bool $single = false ) {
		return carbon_get_post_meta( $id, $key );
	}

	/**
	 * Set.
	 *
	 * @param integer $id Id.
	 * @param string  $key Key.
	 * @param mixed   $value Value.
	 * @return IMeta
	 */
	public function set( int $id, string $key, $value ) : IMeta {
		carbon_set_post_meta( $id, $key, $value );
		return $this;
	}
}
