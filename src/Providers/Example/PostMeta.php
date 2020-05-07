<?php declare(strict_types = 1);

namespace App\Providers\Example;

use App\Entities\Example as Entity;
use App\Repositories\Example as Repository;
use WPSteak\Loggers\WordPress as Logger;
use WPSteak\Providers\AbstractHookProvider;

class PostMeta extends AbstractHookProvider {

	protected Repository $repository;

	protected Logger $logger;

	public function __construct( Repository $repository, Logger $logger ) {
		$this->repository = $repository;
		$this->logger = $logger;
	}

	/**
	 * {@inheritDoc}
	 */
	public function register_hooks(): void {
		$this->add_action( 'init', 'register' );
		$this->add_action( 'add_meta_boxes', 'add_boxes' );
		$this->add_action( 'save_post_' . Entity::POST_TYPE, 'save' );
	}

	public function render_data_callback( \WP_Post $post ): void {
		try {
			// phpcs:ignore SlevomatCodingStandard.Variables.UnusedVariable
			$entity = $this->repository->find_one_by_post( $post );
			include $this->plugin->get_path( 'views/meta-box-data.php' );
		} catch ( \Throwable $th ) {
			$this->logger->error( $th->getMessage() );
		}
	}

	protected function register(): void {
		register_post_meta(
			Entity::POST_TYPE,
			'address',
			[
				'type' => 'string',
				'sanitize_callback' => 'sanitize_text_field',
				'single' => true,
				'show_in_rest' => true,
				'description' => __( 'Endereço.', 'app' ),
			],
		);
	}

	protected function add_boxes(): void {
		add_meta_box(
			Entity::POST_TYPE . '-data-id',
			__( 'Data', 'app' ),
			[$this, 'render_data_callback'],
			Entity::POST_TYPE,
		);
	}

	protected function save( int $post_id ): void {
		// phpcs:ignore WordPress.Security.NonceVerification
		$address = isset( $_POST['address'] )
			// phpcs:ignore WordPress.Security.NonceVerification
			? sanitize_text_field( $_POST['address'] )
			: '';
		update_post_meta( $post_id, 'address', $address );
	}

}
