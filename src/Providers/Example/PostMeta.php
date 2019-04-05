<?php
/**
 * Post Meta.
 *
 * @package App
 */

declare(strict_types=1);

namespace App\Providers\Example;

use App\Entities\Example as Entity;
use App\Repositories\Example as Repository;
use WPSteak\Loggers\WordPress as Logger;
use WPSteak\Providers\AbstractHookProvider;

/**
 * Post Meta class.
 */
class PostMeta extends AbstractHookProvider {

	/**
	 * Repository.
	 *
	 * @var Repository
	 */
	protected $repository;

	/**
	 * Logger.
	 *
	 * @var Logger
	 */
	protected $logger;

	/**
	 * Repository.
	 *
	 * @param Repository $repository Repository.
	 * @param Logger     $logger Logger.
	 */
	public function __construct( Repository $repository, Logger $logger ) {
		$this->repository = $repository;
		$this->logger     = $logger;
	}

	/**
	 * Register hooks.
	 *
	 * @return void
	 */
	public function register_hooks() {
		$this->add_action( 'init', 'register' );
		$this->add_action( 'add_meta_boxes', 'add_boxes' );
		$this->add_action( 'save_post_' . Entity::POST_TYPE, 'save' );
	}

	/**
	 * Register.
	 *
	 * @return void
	 */
	protected function register() {
		register_post_meta(
			Entity::POST_TYPE,
			'address',
			[
				'type'              => 'string',
				'sanitize_callback' => 'sanitize_text_field',
				'single'            => true,
				'show_in_rest'      => true,
				'description'       => __( 'Endereço.', 'app' ),
			]
		);
	}

	/**
	 * Add boxes.
	 *
	 * @return void
	 */
	protected function add_boxes() {
		add_meta_box(
			Entity::POST_TYPE . '-data-id',
			__( 'Data', 'app' ),
			[ $this, 'render_data_callback' ],
			Entity::POST_TYPE
		);
	}

	/**
	 * Render data callback.
	 *
	 * @param \WP_Post $post Post.
	 * @return void
	 */
	public function render_data_callback( $post ) {
		try {
			$entity = $this->repository->find_one( $post );
			include $this->plugin->get_path( 'views/meta-box-data.php' );
		} catch ( \Throwable $th ) {
			$this->logger->error( $th->getMessage() );
		}
	}

	/**
	 * Save.
	 *
	 * @param int $post_id Post id.
	 * @return void
	 */
	protected function save( $post_id ) {
		// @phpcs:ignore
		$address = ! empty( $_POST['address'] ) ? sanitize_text_field( $_POST['address'] ) : '';
		update_post_meta( $post_id, 'address', $address );
	}
}
