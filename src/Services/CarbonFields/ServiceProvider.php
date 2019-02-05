<?php
/**
 * Service provider.
 *
 * @package App
 */

declare(strict_types=1);

namespace App\Services\CarbonFields;

use Carbon_Fields\Helper\Helper as CarbonHelper;

/**
 * Service provider class.
 *
 * @codeCoverageIgnore
 */
class ServiceProvider extends \League\Container\ServiceProvider\AbstractServiceProvider {

	/**
	 * Provides.
	 *
	 * @var string[]
	 */
	protected $provides = [
		CarbonHelper::class,
	];

	/**
	 * Register.
	 *
	 * @link https://github.com/thephpleague/container/issues/159
	 * @return void
	 */
	public function register() {
		$this->getContainer()
			->/* @scrutinizer ignore-call */ share( CarbonHelper::class, CarbonHelper::class );
	}
}
