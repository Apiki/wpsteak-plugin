<?php declare(strict_types = 1);

namespace App\Repositories;

use App\Entities\Example as Entity;
use App\Entities\Examples;
use WPSteak\Repositories\AbstractPost;

/** @codeCoverageIgnore */
class Example extends AbstractPost {

	public function find_one_by_post( \WP_Post $post ): ?Entity {
		return new Entity( $post, $this->meta->get( (int) $post->ID, 'address', true ) );
	}

	public function find_by_author_id( int $author_id, int $quantity ): Examples {
		$posts = $this->get_posts(
			[
				'numberposts' => $quantity,
				'author' => $author_id,
			],
		);

		return new Examples(
			...array_map(
				fn ( \WP_Post $post ) => new Entity(
					$post,
					$this->meta->get( (int) $post->ID, 'address', true ),
				),
				$posts,
			),
		);
	}

}
