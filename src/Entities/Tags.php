<?php declare(strict_types = 1);

namespace App\Entities;

class Tags implements \IteratorAggregate {

	/** @var array<\App\Entities\Tag> */
	private array $tags;

	public function __construct( Tag ...$tags ) {
		$this->tags = $tags;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getIterator() {
		return new \ArrayIterator( $this->tags );
	}

}
