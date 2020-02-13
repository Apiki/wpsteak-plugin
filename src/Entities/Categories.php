<?php declare(strict_types = 1);

namespace App\Entities;

class Categories implements \IteratorAggregate {

	/** @var array<\App\Entities\Category> */
	private array $categories;

	public function __construct( Category ...$categories ) {
		$this->categories = $categories;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getIterator() {
		return new \ArrayIterator( $this->categories );
	}

}
