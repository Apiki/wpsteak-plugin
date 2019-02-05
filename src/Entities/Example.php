<?php
/**
 * Example.
 *
 * @package App
 */

declare(strict_types=1);

namespace App\Entities;

use WPSteak\Entities\AbstractPost;

/**
 * Example class.
 */
class Example extends AbstractPost {

	/**
	 * Address.
	 *
	 * @var string
	 */
	protected $address;

	/**
	 * Get address.
	 *
	 * @return string
	 */
	public function get_address() : string {
		return (string) $this->address;
	}

	/**
	 * Set address.
	 *
	 * @param string $value Address.
	 * @return self
	 */
	public function set_address( $value ) : self {
		$this->address = $value;
		return $this;
	}

	/**
	 * {@inheritDoc}
	 */
	const POST_TYPE = 'example';
}
