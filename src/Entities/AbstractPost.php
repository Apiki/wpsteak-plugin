<?php
/**
 * Abstract post.
 *
 * @package App
 */

declare(strict_types=1);

namespace App\Entities;

/**
 * Abstract post class.
 */
abstract class AbstractPost implements PostInterface {

	/**
	 * Post data.
	 *
	 * @var \WP_Post
	 */
	protected $post;

	/**
	 * Post Type.
	 */
	const POST_TYPE = 'post';

	/**
	 * {@inheritDoc}
	 *
	 * @return \WP_Post
	 */
	public function get_post() : \WP_Post {
		return $this->post;
	}

	/**
	 * {@inheritDoc}
	 *
	 * @param \WP_Post $value Post.
	 * @return PostInterface
	 */
	public function set_post( \WP_Post $value ) : PostInterface {
		$this->post = $value;
		return $this;
	}
}
