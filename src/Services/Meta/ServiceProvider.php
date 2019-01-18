<?php
/**
 * Service provider.
 *
 * @package App
 */

declare(strict_types=1);

namespace App\Services\Meta;

/**
 * Service provider class.
 */
class ServiceProvider extends \League\Container\ServiceProvider\AbstractServiceProvider {

	/**
	 * Provides.
	 *
	 * @var string[]
	 */
	protected $provides = [
		PostInterface::class,
		TermInterface::class,
	];

	/**
	 * Register.
	 *
	 * @link https://github.com/thephpleague/container/issues/159
	 * @return void
	 */
	public function register() {
		// @scrutinizer ignore-call
		$this->getContainer()->share( PostInterface::class, Post::class );
		// @scrutinizer ignore-call
		$this->getContainer()->share( TermInterface::class, Term::class );
	}
}
