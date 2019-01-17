<?php
/**
 * Term.
 *
 * @package App
 */

namespace App\Services\Meta;

/**
 * Term class.
 */
class Term implements TermInterface {

	/**
	 * {@inheritDoc}
	 *
	 * @param integer $id Id.
	 * @param string  $key Key.
	 * @param boolean $single Single.
	 * @return mixed
	 */
	public function get( int $id, string $key, bool $single = false ) {
		return get_term_meta( $id, $key, $single );
	}

	/**
	 * {@inheritDoc}
	 *
	 * @param integer $id Id.
	 * @param string  $key Key.
	 * @param mixed   $value Value.
	 * @return TermInterface
	 */
	public function set( int $id, string $key, $value ) : TermInterface {
		update_term_meta( $id, $key, $value );
		return $this;
	}
}
