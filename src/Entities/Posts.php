<?php declare(strict_types = 1);

namespace App\Entities;

class Posts implements \IteratorAggregate {

	/** @var array<\App\Entities\Post> */
	private array $posts;

	public function __construct( Post ...$posts ) {
		$this->posts = $posts;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getIterator() {
		return new \ArrayIterator( $this->posts );
	}

}
