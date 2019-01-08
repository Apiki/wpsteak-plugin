<?php
/**
 * Entity.
 *
 * @package App\Test
 */

namespace App\Test\Framework\Mock;

use App\Entities\EntityInterface;

/**
 * Entity class.
 */
class Entity implements EntityInterface {

	/**
	 * Id.
	 *
	 * @var integer
	 */
	private $id = 0;

	/**
	 * Set id.
	 *
	 * @param integer $id Id.
	 * @return self
	 */
	public function set_id( $id ) : self {
		$this->id = (int) $id;
		return $this;
	}

	/**
	 * Get id.
	 *
	 * @return integer
	 */
	public function get_id() : int {
		return $this->id;
	}
}
