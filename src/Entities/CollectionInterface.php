<?php
/**
 * Collection.
 *
 * @package App
 */

declare(strict_types=1);

namespace App\Entities;

/**
 * Collection interface.
 */
interface CollectionInterface extends \Iterator, \ArrayAccess, \Countable {

	/**
	 * Add entity.
	 *
	 * @param EntityInterface $entity Entity.
	 * @param mixed           $key Key.
	 * @return void
	 */
	public function add_entity( EntityInterface $entity, $key = null );
}
