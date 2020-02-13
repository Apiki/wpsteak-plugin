<?php declare(strict_types = 1);

namespace App\Services\Meta;

use Carbon_Fields\Helper\Helper as CarbonHelper;
use WPSteak\Services\Meta\IMeta;
use WPSteak\Services\Meta\PostInterface;

/**
 * Carbon Post class.
 *
 * @codeCoverageIgnore
 */
class CarbonPost implements PostInterface {

	/**
	 * Helper.
	 */
	protected CarbonHelper $helper;

	/**
	 * Construct.
	 *
	 * @param \Carbon_Fields\Helper\Helper $helper Helper.
	 */
	public function __construct( CarbonHelper $helper ) {
		$this->helper = $helper;
	}

	/**
	 * {@inheritDoc}
	 */
	public function get(
		int $pid,
		string $key,
		// phpcs:ignore SlevomatCodingStandard.Functions.UnusedParameter
		bool $single = false ) {
		return $this->helper::get_post_meta( $pid, $key );
	}

	public function set( int $pid, string $key, string $value ): IMeta {
		$this->helper::set_post_meta( $pid, $key, $value );

		return $this;
	}

}
