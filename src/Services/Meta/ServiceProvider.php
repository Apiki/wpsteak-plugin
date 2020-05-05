<?php declare(strict_types = 1);

namespace App\Services\Meta;

use WPSteak\Services\Meta\Post;
use WPSteak\Services\Meta\PostInterface;
use WPSteak\Services\Meta\Term;
use WPSteak\Services\Meta\TermInterface;

/**
 * Service provider class.
 *
 * @codeCoverageIgnore
 */
class ServiceProvider extends \League\Container\ServiceProvider\AbstractServiceProvider {

	/**
	 * {@inheritDoc}
	 */
	protected $provides = [
		PostInterface::class,
		TermInterface::class,
	];

	/**
	 * {@inheritDoc}
	 */
	public function register(): void {
		$this->getLeagueContainer()
			->share( PostInterface::class, Post::class );

		$this->getLeagueContainer()
			->share( TermInterface::class, Term::class );
	}

}
