<?php
/**
 * Category.
 *
 * @package App
 */

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\Collection;
use App\Entities\Category as Entity;

/**
 * Category class.
 */
class Category extends AbstractTerm {

	/**
	 * Find by id.
	 *
	 * @param integer $id Id.
	 * @return Entity|null
	 */
	public function find_by_id( int $id ) : ?Entity {
		$term = $this->get_term( $id );

		if ( empty( $term ) ) {
			return null;
		}

		return ( new Entity() )->set_term( $term );
	}

	/**
	 * Find all.
	 *
	 * @return Collection
	 */
	public function find_all() : Collection {
		$terms = $this->get_terms(
			[
				'taxonomy'   => Entity::TAXONOMY,
				'hide_empty' => false,
			]
		);

		$collection = new Collection();

		foreach ( $terms as $term ) {
			$collection->add_entity( ( new Entity() )->set_term( $term ) );
		}

		return $collection;
	}
}
