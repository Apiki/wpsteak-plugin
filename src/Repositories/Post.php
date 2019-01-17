<?php
/**
 * Post.
 *
 * @package App
 */

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\Collection;
use App\Entities\Post as Entity;

/**
 * Post class.
 */
class Post extends AbstractPost {

	/**
	 * Find by id.
	 *
	 * @param integer $id Id.
	 * @return Entity|null
	 */
	public function find_by_id( int $id ) : ?Entity {
		$post = $this->get_post( $id );

		if ( ! $post ) {
			return null;
		}

		return ( new Entity() )->set_post( $post );
	}

	/**
	 * Find by author id.
	 *
	 * @param integer $author_id Author id.
	 * @param integer $quantity Quantity.
	 * @return Collection
	 */
	public function find_by_author_id( int $author_id, int $quantity ) : Collection {
		$posts = $this->get_posts(
			[
				'numberposts' => $quantity,
				'author'      => $author_id,
			]
		);

		$collection = new Collection();

		foreach ( $posts as $post ) {
			$collection->add_entity( ( new Entity() )->set_post( $post ) );
		}

		return $collection;
	}
}
