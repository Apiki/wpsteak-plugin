<?php
/**
 * Example category.
 *
 * @package App
 */

declare(strict_types=1);

namespace App\Entities;

use WPSteak\Entities\AbstractTerm;

/**
 * Example category class.
 */
class ExampleCategory extends AbstractTerm {

	/**
	 * Taxonomy.
	 */
	const TAXONOMY = 'example_category';
}
