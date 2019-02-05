<?php
/**
 * Post.
 *
 * @package App
 */

declare(strict_types=1);

namespace App\Entities;

use WPSteak\Entities\AbstractPost;

/**
 * Post class.
 */
class Post extends AbstractPost {

	/**
	 * {@inheritDoc}
	 */
	const POST_TYPE = 'post';
}
