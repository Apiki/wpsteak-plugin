<?php
/**
 * Category.
 *
 * @package App
 */

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\Category as Entity;
use WPSteak\Entities\Collection;
use WPSteak\Repositories\AbstractTerm;

/**
 * Category class.
 */
class Category extends AbstractTerm {

	/**
	 * Find one.
	 *
	 * @param \WP_Term|int $term The term object or id.
	 * @return Entity|null
	 */
	public function find_one( $term ) : ?Entity {
		$term = $this->get_term( $term );

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
