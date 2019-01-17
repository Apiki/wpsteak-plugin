<?php
/**
 * Page test.
 *
 * @package App\Test
 */

namespace App\Test\Repositories;

use App\Entities\Page\Collection;
use App\Entities\Page\Entity;
use App\Repositories\Page as Repository;

/**
 * Page test class.
 */
final class PageTest extends \PHPUnit\Framework\TestCase {

	/**
	 * Test find by id fail.
	 *
	 * @return void
	 */
	public function test_find_by_id_fail() {
		$repository = $this->getMockBuilder( Repository::class )
			->disableOriginalConstructor()
			->setMethods( [ 'get_post' ] )
			->getMock();

		$repository->method( 'get_post' )
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
		$post       = $this->getMockBuilder( 'WP_Post' )->getMock();
		$repository = $this->getMockBuilder( Repository::class )
			->disableOriginalConstructor()
			->setMethods( [ 'get_post' ] )
			->getMock();

		$repository->method( 'get_post' )
			->will( $this->returnValue( $post ) );

		$entity = $repository->find_by_id( 1 );

		$this->assertInstanceOf( Entity::class, $entity );
	}
}
