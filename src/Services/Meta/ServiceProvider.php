<?php
/**
 * Service provider.
 *
 * @package App
 */

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
	 * @return void
	 */
	public function register() {
		$this->getContainer()->share( PostInterface::class, Post::class );
		$this->getContainer()->share( TermInterface::class, Term::class );
	}
}
