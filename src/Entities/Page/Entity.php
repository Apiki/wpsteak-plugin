<?php
/**
 * Entity.
 *
 * @package App
 */

namespace App\Entities\Page;

use App\Entities\AbstractPost;

/**
 * Entity class.
 */
class Entity extends AbstractPost {

	/**
	 * {@inheritDoc}
	 */
	const POST_TYPE = 'page';
}
