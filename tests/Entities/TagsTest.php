<?php declare(strict_types = 1);

/**
 * Category test.
 *
 * @package App\Test
 */

namespace App\Test\Entities;

use App\Entities\Tag as Entity;
use App\Entities\Tags;

final class TagsTest extends \PHPUnit\Framework\TestCase {

	private Entity $entity;

	/** @var \App\Entities\Tags&\PHPUnit\Framework\MockObject\MockObject $categories */
	private Tags $categories;

	public function setUp(): void {
		$this->entity     = new Entity();
		$this->categories = new Tags(
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
