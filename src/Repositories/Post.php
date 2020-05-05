<?php declare(strict_types = 1);

namespace App\Repositories;

use App\Entities\Post as Entity;
use WPSteak\Repositories\AbstractPost;

class Post extends AbstractPost {

	public function find_one_by_post( \WP_Post $post ): ?Entity {
		return ( new Entity() )->set_post( $post );
	}

}
