<?php
/**
 * Abstract Taxonomy.
 *
 * @package App
 */

declare(strict_types=1);

namespace App\Providers;

use App\Services\Labels;

/**
 * Abstract Taxonomy class.
 */
abstract class AbstractTaxonomy extends \Cedaro\WP\Plugin\AbstractHookProvider {

	use Labels\Taxonomy;

	/**
	 * Register hooks.
	 *
	 * @return void
	 */
	public function register_hooks() {
		$this->add_action( 'init', 'register_taxonomy' );
	}

	/**
	 * Register Taxonomy.
	 *
	 * @return void
	 */
	protected function register_taxonomy() {
		register_taxonomy( $this->get_taxonomy(), $this->get_object_type(), $this->get_args() );
	}

	/**
	 * Get args for register Taxonomy.
	 *
	 * This is passed for the $args attribute from register_taxonomy function.
	 * You can use the function $this->get_labels() for a easy way making your custom labels.
	 *
	 * @return array
	 */
	abstract public function get_args() : array;

	/**
	 * Get post type.
	 *
	 * Return your Entity::TAXONOMY, for a better code reuse.
	 *
	 * @return string
	 */
	abstract public function get_taxonomy() : string;

	/**
	 * Get object type.
	 *
	 * Passed for $object_type param, it can be an array or a string.
	 *
	 * @return array|string
	 */
	abstract public function get_object_type();
}
