<?php
/**
 * Term.
 *
 * @package App
 */

declare(strict_types=1);

namespace App\Entities;

/**
 * Term interface.
 */
interface TermInterface extends EntityInterface {

	/**
	 * Get term.
	 *
	 * @return \WP_Term
	 */
	public function get_term() : \WP_Term;

	/**
	 * Set term.
	 *
	 * @param \WP_Term $value Term.
	 * @return self
	 */
	public function set_term( \WP_Term $value ) : self;
}
