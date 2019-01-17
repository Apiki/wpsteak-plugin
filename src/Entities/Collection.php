<?php
/**
 * Collection.
 *
 * @package App
 */

declare(strict_types=1);

namespace App\Entities;

/**
 * Collection class.
 */
class Collection implements CollectionInterface {

	use \DusanKasan\Knapsack\CollectionTrait;

	/**
	 * Pool.
	 *
	 * @var array
	 */
	private $pool = [];

	/**
	 * Position.
	 *
	 * @var integer
	 */
	private $position = 0;

	/**
	 * Add entity.
	 *
	 * @param EntityInterface $entity Entity.
	 * @param mixed           $key Key.
	 * @return void
	 */
	public function add_entity( EntityInterface $entity, $key = null ) {
		if ( is_null( $key ) ) {
			$this->pool[] = $entity;
			return;
		}

		$this->pool[ $key ] = $entity;
	}

	/**
	 * Current.
	 *
	 * @return mixed
	 */
	public function current() {
		return $this->pool[ $this->position ];
	}

	/**
	 * Key.
	 *
	 * @return integer
	 */
	public function key() {
		return $this->position;
	}

	/**
	 * Next position.
	 *
	 * @return void
	 */
	public function next() {
		++$this->position;
	}

	/**
	 * Rewind position.
	 *
	 * @return void
	 */
	public function rewind() {
		$this->position = 0;
	}

	/**
	 * Is a valid position.
	 *
	 * @return boolean
	 */
	public function valid() {
		return isset( $this->pool[ $this->position ] );
	}

	/**
	 * Offset exists.
	 *
	 * @param mixed $offset Offset.
	 * @return boolean
	 */
	public function offsetExists( $offset ) {
		return isset( $this->pool[ $offset ] );
	}

	/**
	 * Offset get.
	 *
	 * @param mixed $offset Offset.
	 * @return mixed|null
	 */
	public function offsetGet( $offset ) {
		if ( isset( $this->pool[ $offset ] ) ) {
			return $this->pool[ $offset ];
		}

		return null;
	}

	/**
	 * Offset set.
	 *
	 * @param mixed $offset Offset.
	 * @param mixed $value Value.
	 * @return void
	 */
	public function offsetSet( $offset, $value ) {
		$this->add_entity( $value, $offset );
	}

	/**
	 * Offset unset.
	 *
	 * @param mixed $offset Offset.
	 * @return void
	 */
	public function offsetUnset( $offset ) {
		unset( $this->pool[ $offset ] );
	}

	/**
	 * Total count.
	 *
	 * @return integer
	 */
	public function count() : int {
		return count( $this->pool );
	}
}
