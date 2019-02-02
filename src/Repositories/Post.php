<?php
/**
 * Post.
 *
 * @package App
 */

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\Post as Entity;
use WPSteak\Entities\Collection;
use WPSteak\Repositories\AbstractPost;

/**
 * Post class.
 */
class Post extends AbstractPost {

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
