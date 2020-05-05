<?php declare(strict_types = 1);

/**
 * Post test.
 *
 * @package App\Test
 */

namespace App\Test\Repositories;

use App\Entities\Post as Entity;
use App\Repositories\Post as Repository;

/**
 * Post test class.
 */
final class PostTest extends \PHPUnit\Framework\TestCase {

	private \WP_Post $post;

	/** @var \App\Repositories\Post&\PHPUnit\Framework\MockObject\MockObject $repository */
	private Repository $repository;

	public function setUp(): void {
		$this->post = $this->getMockBuilder( 'WP_Post' )->getMock();
		$this->repository = $this->getMockBuilder( Repository::class )
			->disableOriginalConstructor()
			->setMethods( ['get_post', 'get_posts'] )
			->getMock();
	}

	public function test_find_one_by_post_fail(): void {
		$this->repository->method( 'get_post' )
			->will( $this->returnValue( null ) );

		$entity = $this->repository->find_one_by_post( $this->post );

		$this->assertNull( $entity );
	}

	public function test_find_one_by_post_success(): void {
		$this->repository->method( 'get_post' )
			->will( $this->returnValue( $this->post ) );

		$entity = $this->repository->find_one_by_post( $this->post );

		$this->assertInstanceOf( Entity::class, $entity );
	}

}
