<?php
/**
 * Abstract post.
 *
 * @package App
 */

declare(strict_types=1);

namespace App\Repositories;

use App\Services\Meta\PostInterface as MetaInterface;

/**
 * Abstract post class.
 */
abstract class AbstractPost {

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
	 * Get post.
	 *
	 * @param integer $id Id.
	 * @return \WP_Post|null
	 */
	protected function get_post( int $id ) : ?\WP_Post {
		return get_post( $id );
	}

	/**
	 * Get posts.
	 *
	 * @param array $args Args.
	 * @return \WP_Post[]
	 */
	protected function get_posts( array $args ) : array {
		return get_posts( $args );
	}
}
