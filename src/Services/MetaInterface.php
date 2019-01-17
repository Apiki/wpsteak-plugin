<?php
/**
 * Meta.
 *
 * @package App
 */

namespace App\Services;

/**
 * Meta interface.
 */
interface MetaInterface {

	/**
	 * Get.
	 *
	 * @param integer $id Id.
	 * @param string  $key Key.
	 * @param boolean $single Single.
	 * @return mixed
	 */
	public function get( int $id, string $key, bool $single );

	/**
	 * Set.
	 *
	 * @param integer $id Id.
	 * @param string  $key Key.
	 * @param mixed   $value Value.
	 * @return mixed
	 */
	public function set( int $id, string $key, $value );
}
