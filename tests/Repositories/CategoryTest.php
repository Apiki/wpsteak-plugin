<?php declare(strict_types = 1);

/**
 * Category test.
 *
 * @package App\Test
 */

namespace App\Test\Repositories;

use App\Entities\Categories;
use App\Entities\Category as Entity;
use App\Repositories\Category as Repository;

final class CategoryTest extends \PHPUnit\Framework\TestCase {

	private \WP_Term $term;

	/** @var \App\Repositories\Category&\PHPUnit\Framework\MockObject\MockObject $repository */
	private Repository $repository;

	public function setUp(): void {
		$this->term = $this->getMockBuilder( 'WP_Term' )->getMock();
		$this->repository = $this->getMockBuilder( Repository::class )
			->disableOriginalConstructor()
			->setMethods( ['get_term', 'get_terms'] )
			->getMock();
	}

	public function test_find_one_by_term_id_fail(): void {
		$this->repository->method( 'get_term' )
			->will( $this->returnValue( null ) );

		$entity = $this->repository->find_one_by_term_id( 0 );

		$this->assertNull( $entity );
	}

	public function test_find_one_by_term_id_success(): void {
		$this->repository->method( 'get_term' )
			->will( $this->returnValue( $this->term ) );

		$entity = $this->repository->find_one_by_term_id( 1 );

		$this->assertInstanceOf( Entity::class, $entity );
	}

	public function test_find_all(): void {
		$this->repository->method( 'get_terms' )
			->will( $this->returnValue( [$this->term] ) );

		$categories = $this->repository->find_all();

		$this->assertInstanceOf( Categories::class, $categories );
	}

}
