<?php
/**
 * Collection test.
 *
 * @package App\Test
 */

namespace App\Test\Entities;

use App\Entities\Collection as Collection;
use App\Entities\EntityInterface as Entity;

/**
 * Abstract collection test class.
 */
final class AbstractCollectionTest extends \PHPUnit\Framework\TestCase {

	/**
	 * Test foreach behavior for collection.
	 *
	 * @return void
	 */
	public function test_foreach_behavior_for_collection() {
		$collection = \Mockery::mock( Collection::class )
			->makePartial();

		$entity = \Mockery::mock( Entity::class );

		$collection->add_entity( $entity );
		$counter = 0;

		foreach ( $collection as $key => $value ) {
			$counter++;
			$this->assertSame( 0, $key );
			$this->assertSame( $entity, $value );
		}

		$this->assertSame( 1, $counter );
	}

	/**
	 * Test array access retrieval.
	 *
	 * @return void
	 */
	public function test_array_access_retrieval() {
		$collection = \Mockery::mock( Collection::class )
			->makePartial();

		$entity = \Mockery::mock( Entity::class );

		$this->assertNull( $collection[0] );
		$collection->add_entity( $entity );
		$this->assertNotNull( $collection[0] );
	}

	/**
	 * Test array access retrieval after unspecified addition.
	 *
	 * @return void
	 */
	public function test_array_access_retrieval_after_unspecified_addition() {
		$collection = \Mockery::mock( Collection::class )
			->makePartial();

		$entity = \Mockery::mock( Entity::class );

		$collection[] = $entity;
		$this->assertSame( $entity, $collection[0] );
	}

	/**
	 * Test array access retrieval after specified addition.
	 *
	 * @return void
	 */
	public function test_array_access_retrieval_after_specified_addition() {
		$collection = \Mockery::mock( Collection::class )
			->makePartial();

		$entity = \Mockery::mock( Entity::class );

		$collection[1] = $entity;

		$this->assertEquals( $collection[1], $entity );
	}

	/**
	 * Test array access unset.
	 *
	 * @return void
	 */
	public function test_array_access_unset() {
		$collection = \Mockery::mock( Collection::class )
			->makePartial();

		$entity = \Mockery::mock( Entity::class );

		$collection[] = $entity;

		$this->assertEquals( $collection[0], $entity );
		unset( $collection[0] );
		$this->assertNull( $collection[0] );
	}

	/**
	 * Test array access exists.
	 *
	 * @return void
	 */
	public function test_array_access_exists() {
		$collection = \Mockery::mock( Collection::class )
			->makePartial();

		$entity = \Mockery::mock( Entity::class );

		$collection[] = $entity;

		$this->assertEquals( $collection[0], $entity );
		$this->assertTrue( isset( $collection[0] ) );
		$this->assertFalse( isset( $collection[3] ) );
	}

	/**
	 * Test countable.
	 *
	 * @return void
	 */
	public function test_countable() {
		$collection = \Mockery::mock( Collection::class )
			->makePartial();

		$entity = \Mockery::mock( Entity::class );

		$collection[] = $entity;

		$this->assertEquals( 1, $collection->count() );
	}
}
