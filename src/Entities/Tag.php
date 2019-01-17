<?php
/**
 * Tag.
 *
 * @package App
 */

declare(strict_types=1);

namespace App\Entities;

use App\Entities\AbstractTerm;

/**
 * Tag class.
 */
class Tag extends AbstractTerm {

	/**
	 * {@inheritDoc}
	 */
	const TAXONOMY = 'post_tag';
}
