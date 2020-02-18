<?php declare(strict_types = 1);

namespace App\Repositories;

use App\Entities\Example as Entity;
use App\Entities\Examples;
use WPSteak\Repositories\AbstractPost;

/** @codeCoverageIgnore */
class Example extends AbstractPost {

	public function find_one_by_post( \WP_Post $post ): ?Entity {
		$post = $this->get_post( $post );

		if ( ! $post ) {
			return null;
		}

		return ( new Entity() )
			->set_address( $this->meta->get( (int) $post->ID, 'address', true ) )
			->set_post( $post );
	}

	public function find_by_author_id( int $author_id, int $quantity ): Examples {
		$posts = $this->get_posts(
			[
				'numberposts' => $quantity,
				'author'      => $author_id,
			],
		);

		return new Examples(
			...array_map( static fn( $post ) => ( new Entity() )->set_post( $post ), $posts ),
		);
	}

}
