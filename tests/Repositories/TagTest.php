<?php
/**
 * Tag test.
 *
 * @package App\Test
 */

namespace App\Test\Repositories;

use App\Entities\Collection;
use App\Entities\Tag as Entity;
use App\Repositories\Tag as Repository;

/**
 * Tag test class.
 */
final class TagTest extends \PHPUnit\Framework\TestCase {

	/**
	 * Test find by id fail.
	 *
	 * @return void
	 */
	public function test_find_by_id_fail() {
		$repository = $this->getMockBuilder( Repository::class )
			->disableOriginalConstructor()
			->setMethods( [ 'get_term' ] )
			->getMock();

		$repository->method( 'get_term' )
			->will( $this->returnValue( null ) );

		$entity = $repository->find_by_id( 0 );

		$this->assertNull( $entity );
	}

	/**
	 * Test find by id success.
	 *
	 * @return void
	 */
	public function test_find_by_id_success() {
		$term       = $this->getMockBuilder( 'WP_Term' )->getMock();
		$repository = $this->getMockBuilder( Repository::class )
			->disableOriginalConstructor()
			->setMethods( [ 'get_term' ] )
			->getMock();

		$repository->method( 'get_term' )
			->will( $this->returnValue( $term ) );

		$entity = $repository->find_by_id( 1 );

		$this->assertInstanceOf( Entity::class, $entity );
	}

	/**
	 * Test find all.
	 *
	 * @return void
	 */
	public function test_find_all() {
		$term       = $this->getMockBuilder( 'WP_Term' )->getMock();
		$repository = $this->getMockBuilder( Repository::class )
			->disableOriginalConstructor()
			->setMethods( [ 'get_terms' ] )
			->getMock();

		$repository->method( 'get_terms' )
			->will( $this->returnValue( [ $term ] ) );

		$collection = $repository->find_all( 1, 1 );

		$this->assertInstanceOf( Collection::class, $collection );
	}
}
