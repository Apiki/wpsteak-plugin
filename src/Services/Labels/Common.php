<?php
/**
 * Commom.
 *
 * @package App
 */

declare(strict_types=1);

namespace App\Services\Labels;

/**
 * Commom trait.
 *
 * @codeCoverageIgnore
 */
trait Common {

	/**
	 * Get default labels.
	 *
	 * @param string  $singular Singular label.
	 * @param string  $singular_lower Singular label lower case.
	 * @param string  $plural Plural label.
	 * @param string  $plural_lower Plural label lower case.
	 * @param integer $is_female Is female label.
	 * @return array
	 */
	protected static function get_defaults( string $singular, string $singular_lower, string $plural, string $plural_lower, int $is_female = 0 ) {
		return [
			'name'              => $plural,
			'singular_name'     => $singular,
			'menu_name'         => $plural,
			/* translators: %s label plural lower. */
			'all_items'         => sprintf( _n( 'Todas %s', 'Todos %s', $is_female, 'wpsteak' ), $plural_lower ),
			/* translators: %s label singular lower. */
			'edit_item'         => sprintf( __( 'Editar %s', 'wpsteak' ), $singular_lower ),
			/* translators: %s label singular lower. */
			'view_item'         => sprintf( __( 'Ver %s', 'wpsteak' ), $singular_lower ),
			/* translators: %s label singular lower. */
			'add_new_item'      => sprintf( _n( 'Adicionar nova %s', 'Adicionar novo %s', $is_female, 'wpsteak' ), $singular_lower ),
			/* translators: %s label singular. */
			'parent_item_colon' => sprintf( __( '%s pai:', 'wpsteak' ), $singular ),
			/* translators: %s label plural lower. */
			'search_items'      => sprintf( __( 'Buscar %s', 'wpsteak' ), $plural_lower ),
			/* translators: %s label singular lower. */
			'not_found'         => sprintf( _n( 'Nenhuma %s encontrada.', 'Nenhum %s encontrado.', $is_female, 'wpsteak' ), $singular_lower ),
		];
	}
}
