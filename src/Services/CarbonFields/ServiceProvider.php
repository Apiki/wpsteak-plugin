<?php declare(strict_types = 1);

namespace App\Services\CarbonFields;

use Carbon_Fields\Helper\Helper as CarbonHelper;

/** @codeCoverageIgnore */
class ServiceProvider extends \League\Container\ServiceProvider\AbstractServiceProvider {

	/**
	 * @phpcs SlevomatCodingStandard.Commenting.UselessInheritDocComment
	 * {@inheritDoc}
	 */
	protected $provides = [
		CarbonHelper::class,
	];

	/**
	 * {@inheritDoc}
	 *
	 * @link https://github.com/thephpleague/container/issues/159
	 */
	public function register(): void {
		$this->getContainer()
			->/* @scrutinizer ignore-call */ share( CarbonHelper::class, CarbonHelper::class );
	}

}
