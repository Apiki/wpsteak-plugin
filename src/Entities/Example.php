<?php declare(strict_types = 1);

namespace App\Entities;

use WPSteak\Entities\AbstractPost;

class Example extends AbstractPost {

	public const POST_TYPE = 'example';

	protected string $address;

	public function get_address(): string {
		return $this->address;
	}

	public function set_address( string $value ): self {
		$this->address = $value;

		return $this;
	}

}
