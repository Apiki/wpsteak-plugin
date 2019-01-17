<?php
/**
 * Post.
 *
 * @package App
 */

namespace App\Repositories;

use App\Entities\Post\Collection;
use App\Entities\Post\Entity;

/**
 * Post class.
 */
class Post extends AbstractPost {

	/**
	 * Find by id.
	 *
	 * @param integer $id Id.
	 * @return Post|null
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
	 * @return Post\Collection
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
