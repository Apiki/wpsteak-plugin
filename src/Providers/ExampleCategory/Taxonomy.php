<?php declare(strict_types = 1);

namespace App\Providers\ExampleCategory;

use App\Entities\Example as EntityExample;
use App\Entities\ExampleCategory as Entity;
use WPSteak\Providers\AbstractTaxonomy;
use WPSteak\Services\Labels;

class Taxonomy extends AbstractTaxonomy {

	use Labels\Taxonomy;

	/**
	 * {@inheritDoc}
	 */
	public function get_args(): array {
		return [
			'labels'       => $this->get_labels(
				__( 'Categoria', 'app' ),
				__( 'Categorias', 'app' ),
			),
			'public'       => true,
			'show_in_rest' => true,
			'hierarchical' => true,
		];
	}

	public function get_taxonomy(): string {
		return Entity::TAXONOMY;
	}

	/**
	 * {@inheritDoc}
	 */
	public function get_object_type() {
		return EntityExample::POST_TYPE;
	}

}
