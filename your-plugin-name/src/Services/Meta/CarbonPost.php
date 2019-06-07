<?php
/**
 * Carbon Post.
 *
 * @package App
 */

declare(strict_types=1);

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
	 *
	 * @var CarbonHelper
	 */
	protected $helper;

	/**
	 * Construct.
	 *
	 * @param CarbonHelper $helper Helper.
	 */
	public function __construct( CarbonHelper $helper ) {
		$this->helper = $helper;
	}

	/**
	 * Get.
	 *
	 * @param integer $id Id.
	 * @param string  $key Key.
	 * @param boolean $single Single.
	 * @return mixed
	 */
	public function get( int $id, string $key, bool $single = false ) {
		return $this->helper::get_post_meta( $id, $key );
	}

	/**
	 * Set.
	 *
	 * @param integer $id Id.
	 * @param string  $key Key.
	 * @param mixed   $value Value.
	 * @return IMeta
	 */
	public function set( int $id, string $key, $value ) : IMeta {
		$this->helper::set_post_meta( $id, $key, $value );
		return $this;
	}
}
