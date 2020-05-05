<?php declare(strict_types = 1);

namespace App\Repositories;

use App\Entities\Page as Entity;
use WPSteak\Repositories\AbstractPost;

class Page extends AbstractPost {

	public function find_one_by_post( \WP_Post $post ): ?Entity {
		return ( new Entity() )->set_post( $post );
	}

}
