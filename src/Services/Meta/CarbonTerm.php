<?php declare(strict_types = 1);

namespace App\Services\Meta;

use Carbon_Fields\Helper\Helper as CarbonHelper;
use WPSteak\Services\Meta\IMeta;
use WPSteak\Services\Meta\TermInterface;

/** @codeCoverageIgnore */
class CarbonTerm implements TermInterface {

	protected CarbonHelper $helper;

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
		return $this->helper::get_term_meta( $pid, $key );
	}

	public function set( int $pid, string $key, string $value ): IMeta {
		$this->helper::set_term_meta( $pid, $key, $value );

		return $this;
	}

}
