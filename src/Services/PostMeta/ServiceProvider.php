<?php
/**
 * Service provider.
 *
 * @package App
 */

namespace App\Services\PostMeta;

use App\Services\MetaInterface;

/**
 * Service provider class.
 */
class ServiceProvider extends \League\Container\ServiceProvider\AbstractServiceProvider {

	/**
	 * Provides;
	 *
	 * @var string[]
	 */
	protected $provides = [
		MetaInterface::class,
	];

	/**
	 * Register.
	 *
	 * @return void
	 */
	public function register() {
		$this->getContainer()->share( MetaInterface::class, Generic::class );
	}
}
