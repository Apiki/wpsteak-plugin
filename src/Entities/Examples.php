<?php declare(strict_types = 1);

namespace App\Entities;

/** @codeCoverageIgnore */
class Examples implements \IteratorAggregate {

	/** @var array<\App\Entities\Example> */
	private array $examples;

	public function __construct( Example ...$examples ) {
		$this->examples = $examples;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getIterator() {
		return new \ArrayIterator( $this->examples );
	}

}
