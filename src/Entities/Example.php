<?php declare(strict_types = 1);

namespace App\Entities;

use WPSteak\Entities\AbstractPost;

/** @codeCoverageIgnore */
class Example extends AbstractPost {

	public const POST_TYPE = 'example';

	protected string $address;

	public function __construct( \WP_Post $post, string $address ) {
		$this->post = $post;
		$this->address = $address;
	}

	public function get_address(): string {
		return $this->address;
	}

}
