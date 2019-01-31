<?php
/**
 * Post Type.
 *
 * @package App
 */

declare(strict_types=1);

namespace App\Services\Labels;

/**
 * Post Type trait.
 *
 * @codeCoverageIgnore
 */
trait PostType {

	use Common;

	/**
	 * Get default labels.
	 *
	 * @param string  $singular Singular label.
	 * @param string  $plural Plural label.
	 * @param integer $is_female Is female label.
	 * @param array   $defaults Defaults label.
	 * @return array
	 */
	public function get_labels( string $singular, string $plural, int $is_female = 0, array $defaults = [] ) {
		$singular_lower = strtolower( $singular );
		$plural_lower   = strtolower( $plural );

		$labels = [
			'add_new'               => _n( 'Adicionar nova', 'Adicionar novo', $is_female, 'wpsteak' ),
			/* translators: %s label singular female lower; %s label singular male lower; */
			'new_item'              => sprintf( _n( 'Nova %s', 'Novo %s', $is_female, 'wpsteak' ), $singular_lower ),
			/* translators: %s label plural lower. */
			'view_items'            => sprintf( __( 'Ver %s', 'wpsteak' ), $plural_lower ),
			/* translators: %s label singular lower. */
			'not_found_in_trash'    => sprintf( _n( 'Nenhuma %s encontrada na Lixeira.', 'Nenhum %s encontrado na Lixeira.', $is_female, 'wpsteak' ), $singular_lower ),
			/* translators: %s label plural lower. */
			'archives'              => sprintf( __( 'Arquivos de %s', 'wpsteak' ), $plural_lower ),
			/* translators: %s label plural lower. */
			'attributes'            => sprintf( __( 'Atributos de %s', 'wpsteak' ), $plural_lower ),
			/* translators: %s label singular lower. */
			'insert_into_item'      => sprintf( _n( 'Inserir na %s', 'Inserir no %s', $is_female, 'wpsteak' ), $singular_lower ),
			/* translators: %s label singular lower. */
			'uploaded_to_this_item' => sprintf( _n( 'Carregado para esta %s', 'Carregado para este %s', $is_female, 'wpsteak' ), $singular_lower ),
			'featured_image'        => __( 'Imagem destacada', 'wpsteak' ),
			'set_featured_image'    => __( 'Definir imagem destacada', 'wpsteak' ),
			'remove_featured_image' => __( 'Remover imagem destacada', 'wpsteak' ),
			'use_featured_image'    => __( 'Usar como imagem destacada', 'wpsteak' ),
			/* translators: %s label plural lower. */
			'filter_items_list'     => sprintf( __( 'Filtrar lista de %s', 'wpsteak' ), $plural_lower ),
			/* translators: %s label plural lower. */
			'items_list_navigation' => sprintf( __( 'Navegação da lista de %s', 'wpsteak' ), $plural_lower ),
			/* translators: %s label plural lower. */
			'items_list'            => sprintf( __( 'Lista de %s', 'wpsteak' ), $plural_lower ),
			'name_admin_bar'        => $singular,
		];

		$labels = array_merge(
			$labels,
			$this->get_defaults(
				$singular,
				$singular_lower,
				$plural,
				$plural_lower,
				$is_female
			)
		);

		return array_merge( $labels, $defaults );
	}
}
