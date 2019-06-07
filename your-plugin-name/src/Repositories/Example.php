<?php
/**
 * Example.
 *
 * @package App
 */

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\Example as Entity;
use WPSteak\Entities\Collection;
use WPSteak\Repositories\AbstractPost;

/**
 * Example class.
 */
class Example extends AbstractPost {

	/**
	 * Find one.
	 *
	 * @param \WP_Post|int $post The post object or id.
	 * @return Entity|null
	 */
	public function find_one( $post ) : ?Entity {
		$post = $this->get_post( $post );

		if ( empty( $post ) ) {
			return null;
		}

		$entity = new Entity();
		$entity
			->set_address( $this->meta->get( (int) $post->ID, 'address', true ) )
			->set_post( $post );

		return $entity;
	}
}
