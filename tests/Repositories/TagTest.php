<?php declare(strict_types = 1);

/**
 * Tag test.
 *
 * @package App\Test
 */

namespace App\Test\Repositories;

use App\Entities\Tag as Entity;
use App\Entities\Tags;
use App\Repositories\Tag as Repository;

final class TagTest extends \PHPUnit\Framework\TestCase {

	private \WP_Term $term;

	/** @var \App\Repositories\Tag&\PHPUnit\Framework\MockObject\MockObject $repository */
	private Repository $repository;

	public function setUp(): void {
		$this->term = $this->getMockBuilder( 'WP_Term' )->getMock();
		$this->repository = $this->getMockBuilder( Repository::class )
			->disableOriginalConstructor()
			->setMethods( ['get_term', 'get_terms'] )
			->getMock();
	}

	public function test_find_one_by_term_fail(): void {
		$this->repository->method( 'get_term' )
			->will( $this->returnValue( null ) );

		$entity = $this->repository->find_one_by_term( $this->term );

		$this->assertNull( $entity );
	}

	public function test_find_one_by_term_success(): void {
		$this->repository->method( 'get_term' )
			->will( $this->returnValue( $this->term ) );

		$entity = $this->repository->find_one_by_term( $this->term );

		$this->assertInstanceOf( Entity::class, $entity );
	}

	public function test_find_all(): void {
		$this->repository->method( 'get_terms' )
			->will( $this->returnValue( [$this->term] ) );

		$collection = $this->repository->find_all();

		$this->assertInstanceOf( Tags::class, $collection );
	}

}
