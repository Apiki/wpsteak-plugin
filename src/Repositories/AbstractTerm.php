<?php
/**
 * Abstract term.
 *
 * @package App
 */

declare(strict_types=1);

namespace App\Repositories;

use App\Services\Meta\TermInterface as MetaInterface;

/**
 * Abstract term class.
 */
abstract class AbstractTerm {

	/**
	 * Meta.
	 *
	 * @var MetaInterface
	 */
	protected $meta;

	/**
	 * Construct.
	 *
	 * @param MetaInterface $meta Meta.
	 */
	public function __construct( MetaInterface $meta ) {
		$this->meta = $meta;
	}

	/**
	 * Get term.
	 *
	 * @param integer $id Id.
	 * @return \WP_Error|\WP_term|array
	 * @throws \InvalidArgumentException When $id param is empty.
	 */
	protected function get_term( int $id ) {
		if ( empty( $id ) ) {
			throw new \InvalidArgumentException( __( 'Termo vazio.', 'wpsteak' ) );
		}

		return get_term( $id );
	}

	/**
	 * Get terms.
	 *
	 * @param array $args Args.
	 * @return \WP_Error|\WP_Term[]
	 * @throws \InvalidArgumentException When the passed taxonomy does not exists.
	 */
	protected function get_terms( array $args ) : array {
		$terms = get_terms( $args );

		if ( is_wp_error( $terms ) ) {
			throw new \InvalidArgumentException( __( 'Taxonomia não existe', 'wpsteak' ) );
		}

		return $terms;
	}
}
