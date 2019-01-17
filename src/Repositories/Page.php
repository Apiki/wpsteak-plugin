<?php
/**
 * Page.
 *
 * @package App
 */

namespace App\Repositories;

use App\Entities\Page\Entity;

/**
 * Page class.
 */
class Page extends AbstractPost {

	/**
	 * Find by id.
	 *
	 * @param integer $id Id.
	 * @return Post|null
	 */
	public function find_by_id( int $id ) : ?Entity {
		$post = $this->get_post( $id );

		if ( ! $post ) {
			return null;
		}

		return ( new Entity() )->set_post( $post );
	}
}
