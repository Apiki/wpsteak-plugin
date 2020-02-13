<?php declare(strict_types = 1);

namespace App\Repositories;

use App\Entities\Tag as Entity;
use App\Entities\Tags;
use WPSteak\Repositories\AbstractTerm;

class Tag extends AbstractTerm {

	public function find_one_by_term( \WP_Term $term ): ?Entity {
		$term = $this->get_term( $term );

		if ( ! $term ) {
			return null;
		}

		return ( new Entity() )->set_term( $term );
	}

	public function find_all(): Tags {
		$terms = $this->get_terms(
			[
				'taxonomy'   => Entity::TAXONOMY,
				'hide_empty' => false,
			],
		);

		return new Tags(
			...array_map( static fn( $term ) => ( new Entity() )->set_term( $term ), $terms ),
		);
	}

}
