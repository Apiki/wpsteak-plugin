<?php
/**
 * Category.
 *
 * @package App
 */

declare(strict_types=1);

namespace App\Entities;

use App\Entities\AbstractTerm;

/**
 * Category class.
 */
class Category extends AbstractTerm {

	/**
	 * {@inheritDoc}
	 */
	const TAXONOMY = 'category';
}
