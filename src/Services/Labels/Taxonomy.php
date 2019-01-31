<?php
/**
 * Taxonomy.
 *
 * @package App
 */

declare(strict_types=1);

namespace App\Services\Labels;

/**
 * Taxonomy trait.
 *
 * @codeCoverageIgnore
 */
trait Taxonomy {

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
			/* translators: %s label singular lower. */
			'update_item'                => sprintf( __( 'Atualizar %s', 'wpsteak' ), $singular_lower ),
			/* translators: %s label singular lower. */
			'new_item_name'              => sprintf( _n( 'Nome da nova %s', 'Nome do novo %s', $is_female, 'wpsteak' ), $singular_lower ),
			/* translators: %s label singular. */
			'parent_item'                => sprintf( __( '%s pai', 'wpsteak' ), $singular ),
			/* translators: %s label singular. */
			'popular_items'              => sprintf( __( '%s populares', 'wpsteak' ), $singular ),
			/* translators: %s label plural lower. */
			'separate_items_with_commas' => sprintf( _n( 'Separe as %s com virgulas', 'Separe os %s com virgulas', $is_female, 'wpsteak' ), $plural_lower ),
			/* translators: %s label singular lower. */
			'add_or_remove_items'        => sprintf( __( 'Adicionar ou remover %s', 'wpsteak' ), $singular_lower ),
			/* translators: %s label plural lower. */
			'choose_from_most_used'      => sprintf( _n( 'Escolher entre as %s mais usadas', 'Escolher entre os %s mais usados', $is_female, 'wpsteak' ), $plural_lower ),
			/* translators: %s label singular lower. */
			'back_to_items'              => sprintf( _n( 'Voltar para as %s', 'Voltar para os %s', $is_female, 'wpsteak' ), $plural_lower ),
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
