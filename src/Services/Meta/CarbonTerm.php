<?php
/**
 * Carbon Term.
 *
 * @package App
 */

declare(strict_types=1);

namespace App\Services\Meta;

use WPSteak\Services\Meta\IMeta;
use WPSteak\Services\Meta\TermInterface;

/**
 * Carbon Term class.
 *
 * @codeCoverageIgnore
 */
class CarbonTerm implements TermInterface {

	/**
	 * Get.
	 *
	 * @param integer $id Id.
	 * @param string  $key Key.
	 * @param boolean $single Single.
	 * @return mixed
	 */
	public function get( int $id, string $key, bool $single = false ) {
		return carbon_get_term_meta( $id, $key );
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
		carbon_set_term_meta( $id, $key, $value );
		return $this;
	}
}
