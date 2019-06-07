<?php
/**
 * Post test.
 *
 * @package App\Test
 */

namespace App\Test\Repositories;

use App\Entities\Post as Entity;
use App\Repositories\Post as Repository;
use WPSteak\Entities\Collection;

/**
 * Post test class.
 */
final class PostTest extends \PHPUnit\Framework\TestCase {

	/**
	 * Test find by id fail.
	 *
	 * @return void
	 */
	public function test_find_one_fail() {
		$repository = $this->getMockBuilder( Repository::class )
			->disableOriginalConstructor()
			->setMethods( [ 'get_post' ] )
			->getMock();

		$repository->method( 'get_post' )
			->will( $this->returnValue( null ) );

		$entity = $repository->find_one( 0 );

		$this->assertNull( $entity );
	}

	/**
	 * Test find by id success.
	 *
	 * @return void
	 */
	public function test_find_one_success() {
		$post       = $this->getMockBuilder( 'WP_Post' )->getMock();
		$repository = $this->getMockBuilder( Repository::class )
			->disableOriginalConstructor()
			->setMethods( [ 'get_post' ] )
			->getMock();

		$repository->method( 'get_post' )
			->will( $this->returnValue( $post ) );

		$entity = $repository->find_one( 1 );

		$this->assertInstanceOf( Entity::class, $entity );
	}

	/**
	 * Test find by author id.
	 *
	 * @return void
	 */
	public function test_find_by_author_id() {
		$post       = $this->getMockBuilder( 'WP_Post' )->getMock();
		$repository = $this->getMockBuilder( Repository::class )
			->disableOriginalConstructor()
			->setMethods( [ 'get_posts' ] )
			->getMock();

		$repository->method( 'get_posts' )
			->will( $this->returnValue( [ $post ] ) );

		$collection = $repository->find_by_author_id( 1, 1 );

		$this->assertInstanceOf( Collection::class, $collection );
	}
}
