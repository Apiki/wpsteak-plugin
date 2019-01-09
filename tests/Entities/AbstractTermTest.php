<?php
/**
 * Abstract term test.
 *
 * @package App\Test
 */

namespace App\Test\Entities;

use App\Entities\AbstractTerm as Entity;

/**
 * Abstract term test class.
 */
final class AbstractTermTest extends \App\Test\TestCase {

	/**
	 * Test get term.
	 *
	 * @return void
	 */
	public function test_get_term() {
		$entity = \Mockery::mock( Entity::class )->makePartial();

		$this->assertSame( $entity, $entity->set_term( \Mockery::mock( '\WP_Term' ) ) );
		$this->assertInstanceOf( '\WP_Term', $entity->get_term() );
	}
}
