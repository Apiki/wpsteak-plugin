<?php
/**
 * Collection.
 *
 * @package App
 */

namespace App\Entities\Post;

use App\Entities\AbstractCollection;
use App\Entities\EntityInterface;

/**
 * Collection class.
 */
class Collection extends AbstractCollection {

	/**
	 * {@inheritDoc}
	 *
	 * @return EntityInterface
	 */
	public function build_entity(): EntityInterface {
		return new Entity();
	}
}
