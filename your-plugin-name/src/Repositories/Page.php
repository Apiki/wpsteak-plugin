<?php
/**
 * Page.
 *
 * @package App
 */

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\Page as Entity;
use WPSteak\Repositories\AbstractPost;

/**
 * Page class.
 */
class Page extends AbstractPost {

	/**
	 * Find one.
	 *
	 * @param \WP_Post|int $post The post object or id.
	 * @return Entity|null
	 */
	public function find_one( $post ) : ?Entity {
		$post = $this->get_post( $post );

		if ( empty( $post ) ) {
			return null;
		}

		return ( new Entity() )->set_post( $post );
	}
}
