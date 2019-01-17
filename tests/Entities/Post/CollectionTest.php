<?php
/**
 * Collection test.
 *
 * @package App\Test
 */

namespace App\Test\Entities\Post;

use App\Entities\Post\Collection;
use App\Entities\Post\Entity;

/**
 * Collection test class.
 */
final class CollectionTest extends \PHPUnit\Framework\TestCase {

	/**
	 * Test build entity.
	 *
	 * @return void
	 */
	public function test_build_entity() {
		$entity = \Mockery::mock( Entity::class );

		$collection = \Mockery::mock( Collection::class )->makePartial();

		$this->assertInstanceOf(
			Entity::class,
			$collection->add_blueprint( [] )
		);
	}
}
