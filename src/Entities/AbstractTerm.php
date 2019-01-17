<?php
/**
 * Abstract term.
 *
 * @package App
 */

declare(strict_types=1);

namespace App\Entities;

/**
 * Abstract term class.
 */
abstract class AbstractTerm implements TermInterface {

	/**
	 * Term data.
	 *
	 * @var \WP_Term
	 */
	protected $term;

	/**
	 * Taxonomy.
	 */
	const TAXONOMY = 'category';

	/**
	 * {@inheritDoc}
	 *
	 * @return \WP_Term
	 */
	public function get_term() : \WP_Term {
		return $this->term;
	}

	/**
	 * {@inheritDoc}
	 *
	 * @param \WP_Term $value Term.
	 * @return TermInterface
	 */
	public function set_term( \WP_Term $value ) : TermInterface {
		$this->term = $value;
		return $this;
	}
}
