<?php declare(strict_types = 1);

namespace App\Repositories;

use App\Entities\Categories;
use App\Entities\Category as Entity;
use WPSteak\Repositories\AbstractTerm;

class Category extends AbstractTerm {

	public function find_one_by_term_id( int $term_id ): ?Entity {
		$term = $this->get_term( $term_id );

		if ( ! $term ) {
			return null;
		}

		return ( new Entity() )->set_term( $term );
	}

	public function find_all(): Categories {
		$terms = $this->get_terms(
			[
				'taxonomy'   => Entity::TAXONOMY,
				'hide_empty' => false,
			],
		);

		return new Categories(
			...array_map( static fn( $term ) => ( new Entity() )->set_term( $term ), $terms ),
		);
	}

}
