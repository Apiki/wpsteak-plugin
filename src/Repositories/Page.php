<?php
/**
 * Page.
 *
 * @package App
 */

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\Page as Entity;

/**
 * Page class.
 */
class Page extends AbstractPost {

	/**
	 * Find by id.
	 *
	 * @param integer $id Id.
	 * @return Entity|null
	 */
	public function find_by_id( int $id ) : ?Entity {
		$post = $this->get_post( $id );

		if ( ! $post ) {
			return null;
		}

		return ( new Entity() )->set_post( $post );
	}
}
