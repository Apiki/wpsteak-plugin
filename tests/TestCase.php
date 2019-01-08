<?php
/**
 * Test case.
 *
 * @package App\Test
 */

namespace App\Test;

/**
 * Test case class.
 */
class TestCase extends \WP_Mock\Tools\TestCase {

	/**
	 * Set up.
	 *
	 * @return void
	 */
	public function setUp() {
		\WP_Mock::setUp();
	}

	/**
	 * Tear down.
	 *
	 * @return void
	 */
	public function tearDown() {
		\WP_Mock::tearDown();
	}
}
