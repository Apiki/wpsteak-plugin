<?php
/**
 * Page.
 *
 * @package App
 */

declare(strict_types=1);

namespace App\Entities;

use WPSteak\Entities\AbstractPost;

/**
 * Page class.
 */
class Page extends AbstractPost {

	/**
	 * {@inheritDoc}
	 */
	const POST_TYPE = 'page';
}
