<?php declare(strict_types = 1);

/**
 * Category test.
 *
 * @package App\Test
 */

namespace App\Test\Entities;

use App\Entities\Post as Entity;
use App\Entities\Posts;

final class PostsTest extends \PHPUnit\Framework\TestCase {

	private Entity $entity;

	/** @var \App\Entities\Posts&\PHPUnit\Framework\MockObject\MockObject $categories */
	private Posts $categories;

	public function setUp(): void {
		$this->entity     = new Entity();
		$this->categories = new Posts(
			$this->entity,
		);
	}

	public function test_foreach_behavior_for_collection(): void {
		$counter = 0;

		foreach ( $this->categories as $key => $value ) {
			$counter = +1;
			$this->assertSame( 0, $key );
			$this->assertSame( $this->entity, $value );
		}

		$this->assertSame( 1, $counter );
	}

}
