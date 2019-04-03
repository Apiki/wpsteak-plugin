<?php
/**
 * Taxonomy.
 *
 * @package App
 */

declare(strict_types=1);

namespace App\Providers\ExampleCategory;

use App\Entities\Example as EntityExample;
use App\Entities\ExampleCategory as Entity;
use WPSteak\Providers\AbstractTaxonomy;
use WPSteak\Services\Labels;

/**
 * Taxonomy class.
 */
class Taxonomy extends AbstractTaxonomy {

	use Labels\Taxonomy;

	/**
	 * Get args.
	 *
	 * @return array
	 */
	public function get_args() : array {
		return [
			'labels'       => $this->get_labels(
				__( 'Categoria', 'app' ),
				__( 'Categorias', 'app' )
			),
			'public'       => true,
			'show_in_rest' => true,
			'hierarchical' => true,
		];
	}

	/**
	 * Get Taxonomy.
	 *
	 * @return string
	 */
	public function get_taxonomy() : string {
		return Entity::TAXONOMY;
	}

	/**
	 * Get object type.
	 *
	 * Passed for $object_type param, it can be an array or a string.
	 *
	 * @return array|string
	 */
	public function get_object_type() {
		return EntityExample::POST_TYPE;
	}
}
