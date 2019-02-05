<?php
/**
 * Meta box data.
 *
 * @package App
 */

?>
<label><?php esc_html_e( 'Endereço:', 'app' ); ?>
	<input
		type="text"
		name="address"
		class="large-text"
		value="<?php echo esc_attr( $entity->get_address() ); ?>"
	>
</label>
